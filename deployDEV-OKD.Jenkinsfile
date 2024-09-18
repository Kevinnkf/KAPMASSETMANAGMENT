pipeline {
    // Agent slave 152_Dev
    agent {
        node {
            label 'slave152_Dev'
            //customWorkspace '/home/starlinkdev/workspace/starlink-cdn-api-dev'
        }
    }
    // Environment
    environment {
        APP_NAME = "web-kai-superapps"
        APP_NAME_CODE = "frontend-kai-super-apps"
        BRANCH = "dev"
        BRANCH_CODE = "development"
        ENV = "DEV"
        VER = "alpha"
        CONFREPO = "172.16.27.180"
        APP_SERVER = "172.16.11.118"
    }
    // Stages
    stages {
        // Setup
        stage('Clone Git Dev') {
                steps {
                    echo "Cloning Git Dev"
                    withCredentials([usernamePassword(credentialsId: 'devops-gitlab', usernameVariable: 'USERNAME_GIT', passwordVariable: 'PASSWORD_GIT')]) {
                        sh '''
                            rm -rf $APP_NAME_CODE
                            git clone https://$USERNAME_GIT:$PASSWORD_GIT@gitdev.kai.id/sdm/frontend-kai-super-apps.git
                            cd $APP_NAME_CODE
                            git fetch
                            git checkout $BRANCH_CODE
                        '''
                        script {
                            def tagDescription = sh(
                                script: "git tag -l '${VER}*' | sort -V | tail -n 1",
                                returnStdout: true
                            ).trim()
                            
                            // Extract the desired tag part (e.g., "alpha.1.0.0")
                            def extractedTag = tagDescription.split('/')[0]
                            echo "TAG: ${extractedTag}"
                            env.TAG = extractedTag
                        }
                    }
                }
            }
        stage('Git Push to Gitlab KAI') {
            steps {
                withCredentials([usernamePassword(credentialsId: 'devops-gitlab', usernameVariable: 'USERNAME_GIT_PROD', passwordVariable: 'PASSWORD_GIT_PROD')]) {
                    sh '''
                        cd $APP_NAME_CODE
                        git remote set-url origin https://$USERNAME_GIT_PROD:$PASSWORD_GIT_PROD@git.kai.id/sdm/frontend-kai-super-apps.git
                        git push --force -u origin $BRANCH_CODE
                        TAG=$(git tag -l $VER'*' | sort -V | tail -n 1)
                        git push --force origin tag $TAG
                        cd ..
                        rm -rf $APP_NAME_CODE
                        rm -rf okd-deployment
                    '''
                }
            }
        }
        // Sonarscanner
        // stage('Code Quality Check via SonarQube') {
        //     steps {
        //         echo "run Sonar Scan"
        //         script {
        //             def scannerHome = tool 'sonarqube-tool';
        //             withSonarQubeEnv("sonarqube-server") {
        //                sh "${scannerHome}/bin/sonar-scanner"
        //             }
        //         }
        //     }
        // }
        // stage('Quality Gate Check') {
        //     steps {
        //         timeout(time: 5, unit: 'MINUTES') {
        //             script {
        //                 def qg = waitForQualityGate()
        //                 if (qg.status != 'OK') {
        //                     error "Quality Gate failed: ${qg.status}"
        //                 }
        //             }
        //         }
        //     }
        // }
        //Build Image & Push to Harbor
        stage('Build & Push Image') {
            steps {
                echo "building image..."
                sh'''
                    scp QA_user@${CONFREPO}:/mnt/filebrowser/root/${ENV}/${APP_NAME}/config/.env ${WORKSPACE}/.env
    				scp QA_user@${CONFREPO}:/mnt/filebrowser/root/${ENV}/${APP_NAME}/nginxconf/security.conf.template  ${WORKSPACE}/security.conf.template
    				scp QA_user@${CONFREPO}:/mnt/filebrowser/root/${ENV}/${APP_NAME}/nginxconf/site.conf.template  ${WORKSPACE}/site.conf.template
                    docker build -t hub.kai.id/basekid/web-esa/app:$TAG .
                '''
                echo "pushing image..."
                withCredentials([usernamePassword(credentialsId: 'harbor-creds', usernameVariable: 'USERNAME_HARBOR', passwordVariable: 'PASSWORD_HARBOR')]){ //credentialsID berisi Harbor Creds
                    sh'''
                        docker login -u $USERNAME_HARBOR -p $PASSWORD_HARBOR hub.kai.id
                        docker push hub.kai.id/basekid/web-esa/app:$TAG
                    '''
                }
            }
        }
        // Update manifest to trigger ArgoCD for deployment
        stage('Update Manifest') {
            steps {
                echo "pulling manifest"
                withCredentials([usernamePassword(credentialsId: 'devops-gitlab', usernameVariable: 'USERNAME_GIT', passwordVariable: 'PASSWORD_GIT')]){ //credentialsID berisi Gitlab Creds
                    sh'''
                        rm -rf okd-deployment
                        git clone https://$USERNAME_GIT:$PASSWORD_GIT@git.kai.id/73735/okd-deployment.git
                        ls -la
                        cd okd-deployment
                        git checkout $BRANCH
                        cd $APP_NAME
                        sed -i "s/$VER.*/$TAG'/" deployment.yaml
                        cat deployment.yaml
                        git config --global user.email "devops@kai.id"
                        git config --global user.name "devops"
                        git add .
                        git commit -m "update manifest"
                        git remote show origin
                        git push -u origin $BRANCH
                    '''
                }
            }
        }
    }
    post {
        always {
            echo 'One way or another, I have finished'
            //deleteDir() /* clean up our workspace */
        }
        success {
            script {
                def commitMessage = sh(script: 'git log -n 3 --format=%B', returnStdout: true).trim().split('\n')
                def commitAuthors = sh(script: "git log -n 3 --format='%an' --pretty='%an' | sort -u", returnStdout: true).trim().split('\n')
                //def qg = waitForQualityGate()
                httpRequest contentType: 'APPLICATION_JSON', httpMode: 'POST', requestBody: """{
                    "args": {
                        "to": "120363214202463835@g.us",
                        "content": "New Jenkins OKD, Deploy Application : \\n1. Project : ${APP_NAME} \\n2. Status : *SUCCEEDED* \\n3. Tag : ${env.TAG} \\n4. Last 3 Commit Message : ${commitMessage} \\n5. Last 3 Commit Authors : ${commitAuthors} \\n6. Quality Gate : \${qg.status}"
                    }
                }""", responseHandle: 'NONE', url: 'http://172.16.15.59:8085/sendTextWithMentions', wrapAsMultipart: false
                echo 'I succeeeded!'
            }
        }
        unstable {
            echo 'I am unstable :/'
        }
        failure {
            script {
                def commitMessage = sh(script: 'git log -n 3 --format=%B', returnStdout: true).trim().split('\n')
                def commitAuthors = sh(script: "git log -n 3 --format='%an' --pretty='%an' | sort -u", returnStdout: true).trim().split('\n')
                //def qg = waitForQualityGate()
                httpRequest contentType: 'APPLICATION_JSON', httpMode: 'POST', requestBody: """{
                    "args": {
                        "to": "120363214202463835@g.us",
                        "content": "New Jenkins OKD, Deploy Application : \\n1. Project : ${APP_NAME} \\n2. Status : *FAILURE* \\n3. Tag : ${env.TAG} \\n4. Last 3 Commit Message : ${commitMessage} \\n5. Last 3 Commit Authors : ${commitAuthors} \\n6. Quality Gate : \${qg.status}"
                    }
                }""", responseHandle: 'NONE', url: 'http://172.16.15.59:8085/sendTextWithMentions', wrapAsMultipart: false
                echo 'I failuree!'
            }
        }
        changed {
            echo 'Things were different before...'
        }
    }
}
