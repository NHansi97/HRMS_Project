pipeline {
    agent any 
    
    stages { 
        stage('SCM Checkout') {
            steps {
                retry(3) {
                    git branch: 'master', url: 'https://github.com/NHansi97/HRMS_Project.git'
                    //url: 'https://github.com/NHansi97/HRMS_Project.git'
                }
            }
        }
        stage('Build Docker Image') {
            steps {  
                bat 'docker build -t hansani259/hrms:%BUILD_NUMBER% .'
            }
        }
        stage('Login to Docker Hub') {
            steps {
                    withCredentials([string(credentialsId: 'test-dockerhubpass', variable: 'dockerhubpass')]) {
                              
                    	bat "docker login -u hansani259 -p %dockerhubpass%"
                    
                    }
                }
            }
        stage('Push Image') {
            steps {
                bat 'docker push hansani259/hrms:%BUILD_NUMBER%'
            }
        }
    }
    post {
        always {
            bat 'docker logout'
        }
    }
}