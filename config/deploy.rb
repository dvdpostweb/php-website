set :stages, %w(staging pre_production production)
set :default_stage, "production"
require 'capistrano/ext/multistage'
