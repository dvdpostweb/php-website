#############################################################
#	Application
#############################################################

set :application, "phpapp"
set :deploy_to, "/data/sites/benelux/php_app"

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
set :domain, "pekin"
#set :domain2, "192.168.102.14"
#set :port, 22012
role :web,  domain
role :app,  domain
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
    run "cp /data/sites/benelux/releases/config/includes/functions/database.php  #{release_path}/includes/functions/database.php"
    run "cp /data/sites/benelux/releases/config/configure/*  #{release_path}/configure/"
    run "cp /data/sites/benelux/releases/zend/*  #{release_path}/rest/application/"
    run "chmod 777 -R #{release_path}/webservice/"
  end
end