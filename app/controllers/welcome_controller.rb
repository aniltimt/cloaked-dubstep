class WelcomeController < ApplicationController
   layout "home" , :only => [:index]  
  def index
    @single_facebook_location = Location.find(params[:pin_id]) if !params[:pin_id].blank?
    if !params[:id].blank?
      @locations = Location.where(:category_id=> params[:id])
    else
      @locations = Location.where("category_id IS NOT NULL")
    end
    @locations = @locations.where(:user_id=> current_user.id) if params[:my_pin] == 'true' && !current_user.blank?
    @categories = Category.where("parent_category_id is NULL")
    @json = @locations.to_gmaps4rails do |location, marker|
      marker.title "#{location.title.blank? ? 'ziparama' + ' #' + location.id.to_s : location.title.to_s + ' #' + location.id.to_s}"
      marker.picture({:picture => location.category.photo.url(:small),:width => 32,:height => 32})
    end
    respond_to do |format|
      format.html # index.html.erb 
      format.json { render json: @locations }
    end
  end
  
  def change_pin_data
    single = Location.find(params[:id])
    cat_image_object = single.category
    render :partial => 'google_map_pindetails', :locals => {:cat_image_object => cat_image_object ,:single => single}
  end

  def show_comments
    @pin= params[:pin_id]
    @coments= Comment.where(:pin_id=>params[:pin_id])
    render :layout => false
  end

  def page_content
    @page = Page.find(params[:id])
    render :layout => "application"
  end

  def terms_of_use
    render :layout => "application"
  end
  
  def contact
    render :layout => "application"
  end
  
  def privacy_policy
    render :layout => "application"
  end
  
  def how_it_works
    render :layout => "application"
  end

  def faqs
    render :layout => "application"
  end

  def advertise
    render :layout => "application"
  end

  def about
    render :layout => "application"
  end
end
