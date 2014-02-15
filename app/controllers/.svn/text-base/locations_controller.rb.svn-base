class LocationsController < ApplicationController
  before_filter :require_user
  # GET /locations
  # GET /locations.json
  def index
    @locations = current_user.locations
    @json = @locations.to_gmaps4rails do |location, marker|
      marker.title "#{location.id}"
      if !location.category.blank?
        @photo_url = location.category.photo.url(:small) 
      else
        @photo_url = ''
      end
      marker.picture({:picture => @photo_url ,:width => 32,:height => 32})
    end
    respond_to do |format|
      format.html # index.html.erb
      format.json { render json: @locations }
    end
  end

  # GET /locations/1
  # GET /locations/1.json
  def show
    @location = Location.find(params[:id])
     @json = @location.to_gmaps4rails do |location, marker|
       marker.title "#{location.id}"
       if !location.category.blank?
        @photo_url = location.category.photo.url(:small) 
      else
        @photo_url = ''
      end
       marker.picture({:picture => @photo_url,:width => 32,:height => 32})
      end
    respond_to do |format|
      format.html # show.html.erb
      format.json { render json: @location }
    end
  end

  # GET /locations/new
  # GET /locations/new.json
  def new
    @location = Location.new

    respond_to do |format|
      format.html # new.html.erb
      format.json { render json: @location }
    end
  end

  # GET /locations/1/edit
  def edit
    @location = Location.find(params[:id])
  end

  # POST /locations
  # POST /locations.json
  def create
    if !params[:dynamic].blank?
      @location=Location.new(:longitude=>params[:longitude],:latitude=>params[:latitude],:address => params[:address],:user_id => current_user.id)#,:category_id => Category.first.id:title=> params[:address] ,:description => params[:address],
      @location.save
      render :action => 'edit', :layout => false and return
    else
      @location = Location.new(params[:location])
      respond_to do |format|
        if @location.save
          format.html { redirect_to @location, notice: 'Location was successfully created.' }
          format.json { render json: @location, status: :created, location: @location }
        else
          format.html { render action: "new" }
          format.json { render json: @location.errors, status: :unprocessable_entity }
        end
      end
    end
  end

  # PUT /locations/1
  # PUT /locations/1.json
  def update
    @location = Location.find(params[:id])
    if !params[:dynamic].blank?
      @location.update_attributes(:latitude => params[:latitude],:longitude => params[:longitude]) #,:address=>params[:address]
      @location.save
      render :text => 'Done'
    else
      respond_to do |format|
        if @location.update_attributes(params[:location])
          format.html { redirect_to locations_url, notice: 'Location was successfully updated.' }
          format.json { head :no_content }
        else
          format.html { render action: "edit" }
          format.json { render json: @location.errors, status: :unprocessable_entity }
        end
      end
    end
  end

  # DELETE /locations/1
  # DELETE /locations/1.json
  def destroy
    @location = Location.find(params[:id])
    @location.destroy

    respond_to do |format|
      format.html { redirect_to locations_url }
      format.json { head :no_content }
    end
  end
end
