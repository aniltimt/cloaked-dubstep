class Location < ActiveRecord::Base
  belongs_to :user
  belongs_to :category
  acts_as_gmappable#,:process_geocoding => false
  attr_accessible :address, :latitude, :longitude, :photo , :title,:user_id,:category_id,:description,:website_address,:youtube_video_url
  geocoded_by :address
  after_validation :geocode ,:if => :address_changed?
  has_attached_file :photo, 
                    :styles => { :medium => "300x300>",:large => "600x600!", :thumb => "75x75>" },
                    :url  => "/pics/location/:id/:style/:basename.:extension",
                    :path => ":rails_root/public/pics/location/:id/:style/:basename.:extension",
                    :default_url => "/images/missing.png"
  validates_attachment_content_type :photo, :content_type => ['image/jpeg', 'image/png','image/gif'], :message=>"type is not one of the allowed file types."
  validates_attachment_size :photo, { :in => 1..3072.kilobytes }     
  validates :category_id , :title,:description,:address, :presence => true , :on => :update 

  def gmaps4rails_address
    "#{self.address}" 
  end  
end
