class CreateLocations < ActiveRecord::Migration
  def change
    create_table :locations do |t|
      t.text :address
      t.float :longitude
      t.float :latitude
      t.integer :gmaps
      t.string :title
      t.text :photo_file_name
      t.text :photo_content_type
      t.integer :photo_file_size
      t.integer :category_id
      t.integer :user_id
      t.text :description
      t.timestamps
    end
  end
end
