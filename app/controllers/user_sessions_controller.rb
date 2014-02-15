class UserSessionsController < ApplicationController
  before_filter :require_no_user, :only => [:new, :create]
  before_filter :require_user, :only => :destroy

  def new
    current_url_redirect = request.url
    if current_url_redirect.include?('http://') || !current_url_redirect.include?('www')
      if !current_url_redirect.include?('www')
        if current_url_redirect.include?('https://')
          current_url_redirect.gsub!('https://','https://www.')
        else
          current_url_redirect.gsub!('http://','https://www.')
        end
      else
        current_url_redirect.gsub!('http://','https://')
      end
      redirect_to current_url_redirect and return
    else
      @user_session = UserSession.new
    end
  end

  def create
    @user_session = UserSession.new(params[:user_session])
    if @user_session.save
      flash[:notice] = "Login successful!"
      session[:current_user_privileges] = []
      session[:current_user_privileges] =  @user_session.user.role.privileges.collect{|single| single.id} if !@user_session.user.role.blank? && !@user_session.user.role.privileges.blank?
      redirect_back_or_default root_url
    else
      render :action => :new
    end
  end

  def destroy
    current_user_session.destroy
    session[:current_user_privileges] = []
    flash[:notice] = "Logout successful!"
    redirect_back_or_default new_user_session_url
  end
end
