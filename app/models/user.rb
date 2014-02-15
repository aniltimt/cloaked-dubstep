class User < ActiveRecord::Base
  has_many :authentications
  has_many :comments
  acts_as_authentic 
  belongs_to :role
  has_many :video_albums
  has_many :locations
end
