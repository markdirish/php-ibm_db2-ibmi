#!/usr/bin/env bash

set -x -e -u -o pipefail

docker pull ibmcom/db2
docker run \
    --name db2 \
    -itd \
    --privileged=true \
    -p 60000:50000 \
    -e LICENSE=accept \
    -e DB2INST1_PASSWORD=password \
    -e DBNAME=sample \
    -v $HOME/database:/database \
    ibmcom/db2
docker ps -as

while true
do
  if (docker logs db2 | grep 'Setup has completed')
  then
      break
  fi

  sleep 20
done

