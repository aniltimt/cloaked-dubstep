class CreatePrivileges < ActiveRecord::Migration
  def change
    create_table :privileges do |t|
      t.string :name
      t.timestamps
    end
    
    create_table :privileges_roles , :id => false do |t|
      t.integer :privilege_id
      t.integer :role_id
    end
    

  end
end
