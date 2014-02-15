class AdminsController < ApplicationController
  before_filter :require_no_user, :only => [:index, :login]
  before_filter :require_user, :only => [:dashboard, :pages,:pages_edit,:update]
  def login
    @user_session = UserSession.new(params[:user_session])
    if  @user_session.save && !@user_session.user.blank? && @user_session.user.role.name == 'admin'
      flash[:notice] = "Login successful!"
      session[:current_user_privileges] = []
      session[:current_user_privileges] =  @user_session.user.role.privileges.collect{|single| single.id} if !@user_session.user.role.blank? && !@user_session.user.role.privileges.blank?
      redirect_to "/admins/dashboard",:layout => 'admin'
    else
      render :action => :index,:layout => 'admin'
    end
  end

  def index
    @user_session = UserSession.new(params[:user_session])
    render :layout => 'admin'
  end

  def dashboard
    render :layout => 'admin_inner'
  end

  def pages
    @page = Page.all
    render :layout => 'admin_inner'
  end

  def pages_edit
    @page = Page.find(params[:id])

    render :layout => 'admin_inner'
  end

  def update
    @page = Page.find(params[:page][:id])

      if @page.update_attributes(params[:page])
        redirect_to "/admins/pages"
      else
        redirect_to "/admins/dashboard"
      end
  end

end