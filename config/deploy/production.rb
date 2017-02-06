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
set :domain, "217.112.190.50"
#set :domain2, "pekin"
set :port, 54051
role :web,  domain#,  domain2
role :app,  domain#,  domain2
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
    run "cp /data/sites/benelux/php_app/shared/cached-copy/includes/functions/database.php  #{release_path}/includes/functions/database.php"
    run "cp /data/sites/benelux/php_app/shared/cached-copy/configure/*  #{release_path}/configure/"
    #run "cp /data/sites/benelux/releases/zend/*  #{release_path}/rest/application/"
    #run "chmod 777 -R #{release_path}/webservice/"

    ms_config = <<-EOF
    <?php 
	  $constants['MAX_DISPLAY_SEARCH_RESULTS'] = '10';
	  $constants['MAX_DISPLAY_SEARCH_RESULTS_PRIVATE'] = '30';
	  $constants['MAX_DISPLAY_ORDER_HISTORY'] = '20';
	  $constants['ENVIRONMENT'] = '';
	  $constants['DIR_WS_COMMON'] = '/Users/gs/site_local/trunk/';
	  $constants['DIR_FS_DOCUMENT_ROOT']= '/Users/gs/site_local/trunk/';
	  $constants['ADMINIP']= '192.168.100.254';
	  $constants['DB_SERVER']= '192.168.100.204';
	  $constants['DB_SERVER_RO']= '192.168.100.205';
	  $constants['DB_REDIRECT_ALL_RO'] = 'true';
	  $constants['DB_SERVER_USERNAME']= 'webuser';
	  $constants['DB_SERVER_PASSWORD']= '3gallfir-';
	  $constants['DB_DATABASE']= 'dvdpost_be_prod';
	  $constants['USE_PCONNECT']= 'false';  
	  $constants['STORE_SESSIONS']= '';
	?>
    EOF
    put ms_config, "#{release_path}/configure/configure_machine_specific.php"

  end
end
