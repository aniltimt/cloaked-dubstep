class Category < ActiveRecord::Base
  has_many :locations
  has_many :categories, :class_name => "Category",
    :foreign_key => "parent_category_id"
  belongs_to :parent_category, :class_name => "Category"

  
  validates_presence_of :name
  has_attached_file :photo, :styles => { :small => "32x32>" },
                  :url  => "/pics/category/:id/:style/:basename.:extension",
                  :path => ":rails_root/public/pics/category/:id/:style/:basename.:extension"

validates_attachment_presence :photo
validates_attachment_size :photo, :less_than => 5.megabytes
validates_attachment_content_type :photo, :content_type => ['image/jpeg', 'image/png']


end
