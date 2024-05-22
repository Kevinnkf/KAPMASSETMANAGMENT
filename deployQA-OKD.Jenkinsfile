pipeline {
    // Agent slave152
    agent {
        node {
            label 'slave152'
            //customWorkspace '/home/starlinkdev/workspace/starlink-cdn-api-qa'
        }
    }
    // Environment
    environment {
        APP_NAME = "web-kai-superapps"
        BRANCH = "qa"
        ENV = "QA"
        VER = "beta"
        CONFREPO = "172.16.27.180"
        APP_SERVER = "172.16.11.118"
    }
    // Stages
    stages {
        // Setup
        stage('checkout git') {
            steps {
                git branch: "qa", //git branch, perlu diganti dengan ${env.BRANCH} setelah penamaan branch sudah benar
                credentialsId: 'devops-gitlab',
                url: 'http://git.kai.id/sdm/frontend-kai-super-apps.git'
                script {
                    def tagDescription = sh(
                        script: "git tag -l '${VER}*' | sort -V | tail -n 1",
                        returnStdout: true
                    ).trim()

                    // Extract the desired tag part (e.g., "beta.1.0.0")
                    def trimmedTag = tagDescription =~ /([^-]+)/
                    def extractedTag = trimmedTag[0][0]
                    echo "TAG: ${extractedTag}"
                    // Set the 'TAG' environment variable with the extracted tag
                    env.TAG = extractedTag
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
                        git config --global user.name "devops"x
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
                echo 'I succeeeded!'
            }
            unstable {
                echo 'I am unstable :/'
            }
            failure {
                echo 'I failed :('
            }
            changed {
                echo 'Things were different before...'
            }
        }
}
