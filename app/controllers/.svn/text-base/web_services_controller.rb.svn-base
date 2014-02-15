class WebServicesController < ApplicationController
  before_filter :set_params_mobile
  before_filter :check_user, :exept => [:index]  

  def set_params_mobile
    if mobile_device? 
      params[:user]={:name=>params[:name],:email=>params[:email],:provider=>params[:provider],:uid=>params[:uid]}    
      params[:location]={:description=>params[:description],:website_address=>params[:website_address],:youtube_video_url=>params[:youtube_video_url],:address=>params[:address],:title=>params[:title],:category_id=>params[:category_id],:latitude=>params[:latitude],:longitude=>params[:longitude],:photo=>params[:photo]}
    else
      @error = "Please Use Mobile Application"
      respond_to do |format|
        format.json { render json: @error }
      end
    end
  end

  def check_user
    if !params[:user].blank? && !params[:user][:email].blank? && !params[:user][:provider].blank? && !params[:user][:uid].blank?
      @user = User.find_by_email(params[:user][:email])
      authentication = Authentication.find_by_provider_and_uid(params[:user][:provider], params[:user][:uid])
      if authentication 
        @user = authentication.user 
      elsif !@user.blank?
        @user.authentications.create(:provider => params[:user][:provider], :uid => params[:user][:uid])
      else   
        @user = User.new(:name=> params[:user][:name],
                      :login=> params[:user][:email] + params[:user][:provider],
                      :password=>params[:user][:email],
                      :email=>params[:user][:email],
                      :password_confirmation=>params[:user][:email])   
        @user.authentications.build(:provider => params[:user][:provider], :uid => params[:user][:uid])
        if @user.save
          
        else
          @error = "User Not Found"
          respond_to do |format|
            format.json { render json: @error }
          end
        end
      end
      @user and return
    else
      @error = "User Not Found"
      respond_to do |format|
        format.json { render json: @error }
      end
    end
  end
  


  def index
    if mobile_device? 
  	  @locations = Location.all
    end
    respond_to do |format|
      format.html # index.html.erb
      format.json { render json: @locations }
    end
  end

  def create
    if mobile_device? && !@user.blank? 
      @location=@user.locations.new(params[:location])
    end
    respond_to do |format|
      if !@location.blank? && @location.save
        format.json { render json: @location, status: :created, location: @location }
      else
        format.json { render json: @location.errors, status: :unprocessable_entity }
      end
    end
  end

  def destroy

  end

  def update
    if mobile_device? && !@user.blank? 
      @location = Location.find(params[:id])
    end
    respond_to do |format|
      if !@location.blank? && @location.update_attributes(params[:location])
        format.json { head :no_content }
      else
        format.json { render json: @location.errors, status: :unprocessable_entity }
      end
    end
  end
  
  def mobile_device?
    request.user_agent =~ /Mobile|webOS/
    true
  end

end
