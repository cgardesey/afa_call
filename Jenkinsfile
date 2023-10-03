pipeline {
    agent any

    stages {
        stage('Checkout') {
            steps {
                git branch: 'main', url: 'https://github.com/cgardesey/afa_call'
            }
        }
        stage('Create .env File') {
            steps {
                script {
                    /*def laravelEnvSecret = withCredentials([string(credentialsId: 'laravel-env-secret', variable: 'LARAVEL_ENV_SECRET')]) {
                        return env.LARAVEL_ENV_SECRET
                    }
                    writeFile(file: '.env', text: laravelEnvSecret)*/
                    sh 'cp ../.env .env'
                }
            }
        }
        stage('Build and Deploy') {
            steps {
                // sh 'sudo ./vendor/bin/sail down --rmi all'
                sh './vendor/bin/sail up -d'
                sh 'docker exec afa_call-laravel.test-1 composer install'
                sh 'docker exec afa_call-laravel.test-1 npm install'
                // sh 'docker exec afa_call-laravel.test-1 chmod -R 777 /var/www/html'
                sh './vendor/bin/sail npm run build'
                sh './vendor/bin/sail artisan migrate:fresh --seed'
            }
        }
        stage('Test') {
            steps {
                script {
                    def testStatus = sh(script: 'sudo ./vendor/bin/sail artisan test', returnStatus: true)
                    if (testStatus == 1) {
                        echo 'Tests Passed'
                    } else {
                        currentBuild.result = 'FAILURE'
                        error 'Tests Failed, stopping the build'
                    }
                }
            }
}

    }
}
