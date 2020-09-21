
#!/bin/bash

set -x -e -u -o pipefail

# Now that we've unset TRAVIS, we need to ensure that we're not asked questions
export NO_INTERACTION=true

# Always save the report to report.txt instead of the auto-generated name
export TEST_PHP_ARGS='-s report.txt'

# Ensure that tests are not skipped (false positive) due to bad configuration
export IBM_DB2_TEST_SKIP_CONNECT_FAILURE=0

# Ensure CLI can find the configuration
export DB2CLIINIPATH=$PWD

# Ensure make returns non-zero when a test fails
export REPORT_EXIT_STATUS=1

exec make test --set-timeout 120 < /dev/null
