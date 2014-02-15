class AuthenticationsController < ApplicationController
  # GET /authentications
  # GET /authentications.json
  def index
    @authentications = current_user.authentications if current_user
  end

  # GET /authentications/1
  # GET /authentications/1.json
  def show
    @authentication = Authentication.find(params[:id])

    respond_to do |format|
      format.html # show.html.erb
      format.json { render json: @authentication }
    end
  end

  # GET /authentications/new
  # GET /authentications/new.json
  def new
    @authentication = Authentication.new

    respond_to do |format|
      format.html # new.html.erb
      format.json { render json: @authentication }
    end
  end

  # GET /authentications/1/edit
  def edit
    @authentication = Authentication.find(params[:id])
  end

  # POST /authentications
  # POST /authentications.json


def create
  omniauth = request.env["omniauth.auth"]
  @user = User.find_by_email(omniauth['info']['email'])
  authentication = Authentication.find_by_provider_and_uid(omniauth['provider'], omniauth['uid'])
  if authentication && UserSession.new(authentication.user).save
    flash[:notice] = "Signed in successfully."
    redirect_to root_url
  elsif !@user.blank?
    @user.authentications.create(:provider => omniauth['provider'], :uid => omniauth['uid'])
    UserSession.new(@user).save
    flash[:notice] = "Authentication successful."
    redirect_to root_url
  else   
    user1= Hash.new 
    user1[:name]=omniauth[:info][:name]
    user1[:login]=omniauth['info']['email'] + omniauth ['provider']
    user1[:password]=omniauth['info']['email'] 
    user1[:email]=omniauth['info']['email']
    user1[:password_confirmation]=omniauth['info']['email'] 
    user = User.new(user1)   
    user.authentications.build(:provider => omniauth ['provider'], :uid => omniauth['uid'])
    if user.save
      flash[:notice] = "Signed in successfully."
      redirect_to root_url
    else
      session[:omniauth] = omniauth.except('extra')
      flash[:notice] = "You sign in attempt was unsuccessful. Please try again."
      redirect_to login_url
    end
  end
end

  # PUT /authentications/1
  # PUT /authentications/1.json
  def update
    @authentication = Authentication.find(params[:id])

    respond_to do |format|
      if @authentication.update_attributes(params[:authentication])
        format.html { redirect_to @authentication, notice: 'Authentication was successfully updated.' }
        format.json { head :ok }
      else
        format.html { render action: "edit" }
        format.json { render json: @authentication.errors, status: :unprocessable_entity }
      end
    end
  end

  # DELETE /authentications/1
  # DELETE /authentications/1.json
  def destroy
    @authentication = Authentication.find(params[:id])
    @authentication.destroy

    respond_to do |format|
      format.html { redirect_to authentications_url }
      format.json { head :ok }
    end
  end
end