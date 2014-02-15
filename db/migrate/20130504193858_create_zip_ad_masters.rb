class CreateZipAdMasters < ActiveRecord::Migration
  def change
    create_table :zip_ad_masters do |t|


      t.string :lat
      t.string :longitude
      t.timestamps
    end
  end
end
