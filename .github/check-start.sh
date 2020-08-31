
#!/usr/bin/env bash

set -x -e -u -o pipefail

while true
do
  if (docker logs db2 | grep 'Setup has completed')
  then
      break
  fi

  sleep 20
done
