# Heroku
Site is deployed to heroku automatically when the master branch of our git repo is updated.

# Features
When finishing a feature, `lando drush cex` to export configuration
Merge into master
after the heroku build is complete run
`heroku run drush -y updb`
`heroku run drush -y cim`
`heroku run drush -y cr`
