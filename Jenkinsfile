pipeline {
  agent any

  stages {

   stage ('Init') {
    steps { init() }
   }

   stage ('Build Image') {
    steps {
      buildApplicationImage()
    }
   }

   stage ('Register Image') {
    steps {
      registerApplicationImage()
    }
   }

   stage ('Deploy on staging'){
    steps {
      deployOnStage()
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
  env.REGISTRY_URL = 'https://index.docker.io/v1/'
}

def buildApplicationImage() {
  print("Building docker image")
  // docker.withRegistry(env.REGISTRY_URL, 'DockerHubCredentials') {
  //  buildResult = docker.build(env.IMAGE_NAME)
  // }
}

def registerApplicationImage() {
  print("registering application image")
  // docker.withRegistry(env.REGISTRY_URL, 'DockerHubCredentials') {
  //  buildResult.push()
  // }
}

def deployOnStage() {
  podTemplate(containers: [containerTemplate(args: '', command: '', image: 'bitnami/kubectl', livenessProbe: containerLivenessProbe(execArgs: '', failureThreshold: 0, initialDelaySeconds: 0, periodSeconds: 0, successThreshold: 0, timeoutSeconds: 0), name: 'kubectl', resourceLimitCpu: '', resourceLimitMemory: '', resourceRequestCpu: '', resourceRequestMemory: '', ttyEnabled: true, workingDir: '/home/jenkins/')], inheritFrom: '', instanceCap: 0, label: 'kubectlpod', namespace: '', nodeSelector: '', nodeUsageMode: <object of type hudson.model.Node.Mode>, podRetention: always(), serviceAccount: '', supplementalGroups: '', workspaceVolume: dynamicPVC(accessModes: 'ReadWriteOnce', requestsSize: '', storageClassName: ''), yaml: '') {
    kubectl get all
  }
}
