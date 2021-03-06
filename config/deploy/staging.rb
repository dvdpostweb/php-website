#############################################################
#	Application
#############################################################

set :application, "phpapp"
set :deploy_to, "/data/sites/benelux/php_app_staging"

#############################################################
#	Settings
#############################################################

default_run_options[:pty] = true
ssh_options[:forward_agent] = true
set :use_sudo, false
set :scm_verbose, true

#############################################################
#	Servers
#############################################################

set :user, "phpapp"
set :domain, "217.112.190.50"
set :port, 54051
server domain, :app, :web
role :db, domain, :primary => true

#############################################################
#	Git
#############################################################

set :scm, :git
set :branch, "master"
set :scm_user, 'dvdpost'
set :repository, "git@github.com:dvdpost/php-website.git"
set :deploy_via, :remote_cache

namespace :deploy do
  desc "Create the database yaml file"
  after "deploy:update_code" do
    #run "cp /data/sites/benelux/php_app/shared/cached-copy/includes/functions/database.php  #{release_path}/includes/functions/database.php"
    #run "cp /data/sites/benelux/releases/configure/*  #{release_path}/configure/"
    #run "cp /data/sites/benelux/releases/zend/*  #{release_path}/rest/application/"
    #run "chmod 777 -R #{release_path}/webservice/"
  end
end
