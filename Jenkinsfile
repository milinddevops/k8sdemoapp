pipeline {
  agent any

  stages {

   stage ('Init') {
    steps { init() }
   }

   stage ('Build Image') {
    steps { buildAndRegisterApplicationImage() }
   }

   stage ('Register Image') {
    steps { registerApplicationImage() }
   }

   stage ('Deploy on staging'){
    steps {
      sh 'echo deploy on staging'
    }
   }

   stage('Testing') {
    steps {
      sh 'echo testing'
    }
   }

  }
}


// ============================================================================
// Build steps
// ============================================================================

def buildResult

def init() {
  env.IMAGE_NAME = 'milinddocker/demo:hangout_' + env.BUILD_ID
  env.REGISTRY_URL = 'https://docker.io'
}

def buildApplicationImage() {

  docker.withRegistry(env.REGISTRY_URL, 'DockerHubCredentials') {
    buildResult = docker.build(env.IMAGE_NAME)
  }
}

def registerApplicationImage() {
  docker.withRegistry(env.REGISTRY_URL, 'DockerHubCredentials') {
    buildResult.push()
  }
}
