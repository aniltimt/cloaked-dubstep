load 'deploy/assets'
set :application, "ziparama"
# set :repository,  "set your repository location here"

# # set :scm, :git # You can set :scm explicitly or Capistrano will make an intelligent guess based on known version control directory names
# # Or: `accurev`, `bzr`, `cvs`, `darcs`, `git`, `mercurial`, `perforce`, `subversion` or `none`

# role :web, "your web-server here"                          # Your HTTP server, Apache/etc
# role :app, "your app-server here"                          # This may be the same as your `Web` server
# role :db,  "your primary db-server here", :primary => true # This is where Rails migrations will run
# role :db,  "your slave db-server here"

# if you want to clean up old releases on each deploy uncomment this:
# after "deploy:restart", "deploy:cleanup"

# if you're still using the script/reaper helper you will need
# these http://github.com/rails/irs_process_scripts

# If you are using Passenger mod_rails uncomment this:
# namespace :deploy do
#   task :start do ; end
#   task :stop do ; end
#   task :restart, :roles => :app, :except => { :no_release => true } do
#     run "#{try_sudo} touch #{File.join(current_path,'tmp','restart.txt')}"
#   end
# end
set :scm, :subversion
set :repository,  "svn://66.175.221.136/home/svn/ziparama"
set :scm_username, "arvind" 
set :scm_password, "arvind123"
set :runner, 'root'
set :use_sudo, false
set :user, 'root'
set :password, 'ziparama#1'
# If you aren't deploying to /u/apps/#{application} on the target
# servers (which is the default), you can specify the actual location
# via the :deploy_to variable:
set :deploy_to, "/var/www/ziparama/#{application}"
set :asset_env, "#{asset_env} RAILS_RELATIVE_URL_ROOT=/my_sub_uri"

# If you aren't using Subversion to manage your source code, specify
# your SCM below:
# set :scm, :subversion

role :app, "66.175.221.136"
role :web, "66.175.221.136"
role :db,  "66.175.221.136", :primary => true


namespace :deploy do
  desc "Restarting mod_rails with restart.txt"
  task :restart, :roles => :app do
    run "rm -rf #{current_path}/public/pics"
  	run "mkdir -p /var/www/ziparama/ziparama/shared/pics"
  	run "ln -s /var/www/ziparama/ziparama/shared/pics /var/www/ziparama/ziparama/current/public/pics"
  	run "chmod 777 /var/www/ziparama/ziparama/shared/pics -R"
  	run "rvm use 1.9.2"
    run "chmod 777 #{current_path} -R"
    run "touch #{current_path}/tmp/restart.txt"    
  end
end


namespace :deploy do
 task :start, :roles => :app do
   run "chmod 777 #{current_path} -R"
   run "touch #{current_release}/tmp/restart.txt"
 end
end