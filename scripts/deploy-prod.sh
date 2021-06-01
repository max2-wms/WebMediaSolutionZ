#!/bin/bash

DATE=$(date +'%s')

# Building image
docker build -t max2wms/wms:$DATE --no-cache .
docker tag max2wms/wms:$DATE max2wms/wms

# Push image
docker push max2wms/wms:$DATE
docker push max2wms/wms

# Redeploy stack
npm run swarm:down

sleep 20

npm run swarm:up