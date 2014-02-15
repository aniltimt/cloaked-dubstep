# encoding: UTF-8
# This file is auto-generated from the current state of the database. Instead
# of editing this file, please use the migrations feature of Active Record to
# incrementally modify your database, and then regenerate this schema definition.
#
# Note that this schema.rb definition is the authoritative source for your
# database schema. If you need to create the application database on another
# system, you should be using db:schema:load, not running all the migrations
# from scratch. The latter is a flawed and unsustainable approach (the more migrations
# you'll amass, the slower it'll run and the greater likelihood for issues).
#
# It's strongly recommended to check this file into your version control system.

ActiveRecord::Schema.define(:version => 20130615105023) do

  create_table "ZIP_AD_MASTER", :primary_key => "ID", :force => true do |t|
    t.string  "TITLE",              :limit => 30,                    :null => false
    t.string  "DESCRIPTION",        :limit => 200,                   :null => false
    t.string  "PRICE",              :limit => 100,                   :null => false
    t.string  "CURRENCY",           :limit => 100,                   :null => false
    t.string  "CAT_ID",             :limit => 100,                   :null => false
    t.string  "CATEGORY",           :limit => 100,                   :null => false
    t.string  "ICON",               :limit => 300,                   :null => false
    t.string  "WEBSITE",            :limit => 200,                   :null => false
    t.string  "EMAIL",              :limit => 200,                   :null => false
    t.string  "PHONE",              :limit => 200,                   :null => false
    t.string  "LAT",                :limit => 100,                   :null => false
    t.string  "LONGITUDE",          :limit => 100,                   :null => false
    t.string  "IS_ACTIVATED",       :limit => 20,  :default => "no", :null => false
    t.integer "IS_REPORTED_ABUSED",                                  :null => false
    t.string  "FB_ID",              :limit => 50,                    :null => false
    t.string  "FB_NAME",            :limit => 50,                    :null => false
    t.string  "ABUSE_REPORT_FB_ID", :limit => 50,                    :null => false
    t.integer "IS_REVOKED",                        :default => 0,    :null => false
    t.date    "onDate",                                              :null => false
    t.integer "pin_id"
  end

  create_table "ZIP_CATEGORY_MASTER", :primary_key => "ID", :force => true do |t|
    t.string  "NAME",                 :null => false
    t.string  "ICON",                 :null => false
    t.string  "PATH",  :limit => 200, :null => false
    t.integer "ADMIN",                :null => false
  end

  create_table "ZIP_COMMENT_MASTER", :primary_key => "PID", :force => true do |t|
    t.integer  "PIN_ID",       :null => false
    t.string   "COMMENT"
    t.datetime "COMMENT_TIME", :null => false
    t.integer  "FB_ID"
    t.string   "FB_NAME",      :null => false
    t.string   "FB_IMAGE"
  end

  create_table "ZIP_DOLLER", :primary_key => "ID", :force => true do |t|
    t.string "ZIP_DOLLAR_CODE", :limit => 20, :null => false
    t.string "IS_USED",         :limit => 10, :null => false
  end

  create_table "ZIP_LIKE_MASTER", :primary_key => "ID", :force => true do |t|
    t.string "PINID",   :null => false
    t.string "FB_ID"
    t.string "FB_NAME"
  end

  create_table "ZIP_MERCHANT_MASTER", :primary_key => "ID", :force => true do |t|
    t.string "USERNAME", :limit => 20, :null => false
    t.string "PASSWORD", :limit => 20, :null => false
  end

  create_table "ZIP_SUB_CATEGORY_MASTER", :primary_key => "ID", :force => true do |t|
    t.integer "CAT_ID",                     :null => false
    t.string  "SUB_CAT_NAME", :limit => 30, :null => false
    t.string  "ICON",                       :null => false
  end

  create_table "ZIP_USER", :primary_key => "ID", :force => true do |t|
    t.string  "USERNAME",     :limit => 20, :null => false
    t.string  "PASSWORD",     :limit => 20, :null => false
    t.integer "IS_ACTIVATED",               :null => false
  end

  create_table "authentications", :force => true do |t|
    t.integer  "user_id"
    t.string   "provider"
    t.string   "uid"
    t.datetime "created_at"
    t.datetime "updated_at"
  end

  create_table "categories", :force => true do |t|
    t.string   "name"
    t.integer  "parent_category_id"
    t.integer  "photo_file_size"
    t.string   "photo_content_type"
    t.string   "photo_file_name"
    t.datetime "created_at"
    t.datetime "updated_at"
  end

  create_table "ckeditor_assets", :force => true do |t|
    t.string   "data_file_name",                  :null => false
    t.string   "data_content_type"
    t.integer  "data_file_size"
    t.integer  "assetable_id"
    t.string   "assetable_type",    :limit => 30
    t.string   "type",              :limit => 30
    t.datetime "created_at"
    t.datetime "updated_at"
  end

  add_index "ckeditor_assets", ["assetable_type", "assetable_id"], :name => "idx_ckeditor_assetable"
  add_index "ckeditor_assets", ["assetable_type", "type", "assetable_id"], :name => "idx_ckeditor_assetable_type"

  create_table "comments", :force => true do |t|
    t.integer  "user_id"
    t.integer  "pin_id"
    t.text     "user_comment"
    t.datetime "created_at"
    t.datetime "updated_at"
  end

  create_table "pages", :force => true do |t|
    t.string "page_heading"
    t.text   "content"
  end

  create_table "privileges", :force => true do |t|
    t.string   "name"
    t.datetime "created_at"
    t.datetime "updated_at"
  end

  create_table "privileges_roles", :id => false, :force => true do |t|
    t.integer "privilege_id"
    t.integer "role_id"
  end

  create_table "roles", :force => true do |t|
    t.string   "name"
    t.datetime "created_at"
    t.datetime "updated_at"
  end

  create_table "users", :force => true do |t|
    t.string   "login",                             :null => false
    t.string   "email",                             :null => false
    t.string   "crypted_password",                  :null => false
    t.string   "password_salt",                     :null => false
    t.string   "persistence_token",                 :null => false
    t.integer  "login_count",        :default => 0, :null => false
    t.integer  "failed_login_count", :default => 0, :null => false
    t.datetime "last_request_at"
    t.datetime "current_login_at"
    t.datetime "last_login_at"
    t.string   "current_login_ip"
    t.string   "last_login_ip"
    t.integer  "role_id"
    t.datetime "created_at"
    t.datetime "updated_at"
    t.integer  "comment_id"
  end

  add_index "users", ["email"], :name => "index_users_on_email", :unique => true
  add_index "users", ["login"], :name => "index_users_on_login", :unique => true
  add_index "users", ["persistence_token"], :name => "index_users_on_persistence_token", :unique => true

  create_table "wp_cformsdata", :primary_key => "f_id", :force => true do |t|
    t.integer "sub_id",                                    :null => false
    t.string  "field_name", :limit => 100, :default => "", :null => false
    t.text    "field_val"
  end

  create_table "wp_cformssubmissions", :force => true do |t|
    t.string    "form_id",  :limit => 3,  :default => ""
    t.timestamp "sub_date",                               :null => false
    t.string    "email",    :limit => 40, :default => ""
    t.string    "ip",       :limit => 15, :default => ""
  end

  create_table "wp_commentmeta", :primary_key => "meta_id", :force => true do |t|
    t.integer "comment_id", :limit => 8,          :default => 0, :null => false
    t.string  "meta_key"
    t.text    "meta_value", :limit => 2147483647
  end

  add_index "wp_commentmeta", ["comment_id"], :name => "comment_id"
  add_index "wp_commentmeta", ["meta_key"], :name => "meta_key"

  create_table "wp_comments", :primary_key => "comment_ID", :force => true do |t|
    t.integer  "comment_post_ID",      :limit => 8,   :default => 0,   :null => false
    t.text     "comment_author",       :limit => 255,                  :null => false
    t.string   "comment_author_email", :limit => 100, :default => "",  :null => false
    t.string   "comment_author_url",   :limit => 200, :default => "",  :null => false
    t.string   "comment_author_IP",    :limit => 100, :default => "",  :null => false
    t.datetime "comment_date",                                         :null => false
    t.datetime "comment_date_gmt",                                     :null => false
    t.text     "comment_content",                                      :null => false
    t.integer  "comment_karma",                       :default => 0,   :null => false
    t.string   "comment_approved",     :limit => 20,  :default => "1", :null => false
    t.string   "comment_agent",                       :default => "",  :null => false
    t.string   "comment_type",         :limit => 20,  :default => "",  :null => false
    t.integer  "comment_parent",       :limit => 8,   :default => 0,   :null => false
    t.integer  "user_id",              :limit => 8,   :default => 0,   :null => false
  end

  add_index "wp_comments", ["comment_approved", "comment_date_gmt"], :name => "comment_approved_date_gmt"
  add_index "wp_comments", ["comment_date_gmt"], :name => "comment_date_gmt"
  add_index "wp_comments", ["comment_parent"], :name => "comment_parent"
  add_index "wp_comments", ["comment_post_ID"], :name => "comment_post_ID"

  create_table "wp_gd_manager", :force => true do |t|
    t.string   "file_name"
    t.string   "file_size", :limit => 200
    t.string   "type",      :limit => 100
    t.datetime "date"
  end

  create_table "wp_kws_inpage", :force => true do |t|
    t.string  "keyword", :limit => 250, :null => false
    t.string  "url",     :limit => 250, :null => false
    t.integer "post_id",                :null => false
  end

  add_index "wp_kws_inpage", ["url"], :name => "url"

  create_table "wp_kws_keywords", :force => true do |t|
    t.string  "keyword",     :limit => 250, :null => false
    t.integer "exact_match", :limit => 8
    t.string  "url",         :limit => 250, :null => false
  end

  create_table "wp_kws_not_appropriate", :force => true do |t|
    t.string "keyword", :limit => 250, :null => false
    t.string "url",     :limit => 250, :null => false
  end

  add_index "wp_kws_not_appropriate", ["keyword"], :name => "keyword"

  create_table "wp_kws_related", :force => true do |t|
    t.string  "keyword", :limit => 250, :null => false
    t.string  "url",     :limit => 250, :null => false
    t.integer "links",                  :null => false
    t.integer "post_id",                :null => false
  end

  add_index "wp_kws_related", ["url"], :name => "url"

  create_table "wp_links", :primary_key => "link_id", :force => true do |t|
    t.string   "link_url",                             :default => "",  :null => false
    t.string   "link_name",                            :default => "",  :null => false
    t.string   "link_image",                           :default => "",  :null => false
    t.string   "link_target",      :limit => 25,       :default => "",  :null => false
    t.string   "link_description",                     :default => "",  :null => false
    t.string   "link_visible",     :limit => 20,       :default => "Y", :null => false
    t.integer  "link_owner",       :limit => 8,        :default => 1,   :null => false
    t.integer  "link_rating",                          :default => 0,   :null => false
    t.datetime "link_updated",                                          :null => false
    t.string   "link_rel",                             :default => "",  :null => false
    t.text     "link_notes",       :limit => 16777215,                  :null => false
    t.string   "link_rss",                             :default => "",  :null => false
  end

  add_index "wp_links", ["link_visible"], :name => "link_visible"

  create_table "wp_lockdowns", :primary_key => "lockdown_ID", :force => true do |t|
    t.integer  "user_id",       :limit => 8,                   :null => false
    t.datetime "lockdown_date",                                :null => false
    t.datetime "release_date",                                 :null => false
    t.string   "lockdown_IP",   :limit => 100, :default => "", :null => false
  end

  create_table "wp_login_fails", :primary_key => "login_attempt_ID", :force => true do |t|
    t.integer  "user_id",            :limit => 8,                   :null => false
    t.datetime "login_attempt_date",                                :null => false
    t.string   "login_attempt_IP",   :limit => 100, :default => "", :null => false
  end

  create_table "wp_ngg_album", :force => true do |t|
    t.string  "name",                                            :null => false
    t.string  "slug",                                            :null => false
    t.integer "previewpic", :limit => 8,          :default => 0, :null => false
    t.text    "albumdesc",  :limit => 16777215
    t.text    "sortorder",  :limit => 2147483647,                :null => false
    t.integer "pageid",     :limit => 8,          :default => 0, :null => false
  end

  create_table "wp_ngg_gallery", :primary_key => "gid", :force => true do |t|
    t.string  "name",                                          :null => false
    t.string  "slug",                                          :null => false
    t.text    "path",       :limit => 16777215
    t.text    "title",      :limit => 16777215
    t.text    "galdesc",    :limit => 16777215
    t.integer "pageid",     :limit => 8,        :default => 0, :null => false
    t.integer "previewpic", :limit => 8,        :default => 0, :null => false
    t.integer "author",     :limit => 8,        :default => 0, :null => false
  end

  create_table "wp_ngg_pictures", :primary_key => "pid", :force => true do |t|
    t.string   "image_slug",                                       :null => false
    t.integer  "post_id",     :limit => 8,          :default => 0, :null => false
    t.integer  "galleryid",   :limit => 8,          :default => 0, :null => false
    t.string   "filename",                                         :null => false
    t.text     "description", :limit => 16777215
    t.text     "alttext",     :limit => 16777215
    t.datetime "imagedate",                                        :null => false
    t.integer  "exclude",     :limit => 1,          :default => 0
    t.integer  "sortorder",   :limit => 8,          :default => 0, :null => false
    t.text     "meta_data",   :limit => 2147483647
  end

  add_index "wp_ngg_pictures", ["post_id"], :name => "post_id"

  create_table "wp_options", :primary_key => "option_id", :force => true do |t|
    t.string "option_name",  :limit => 64,         :default => "",    :null => false
    t.text   "option_value", :limit => 2147483647,                    :null => false
    t.string "autoload",     :limit => 20,         :default => "yes", :null => false
  end

  add_index "wp_options", ["option_name"], :name => "option_name", :unique => true

  create_table "wp_postmeta", :primary_key => "meta_id", :force => true do |t|
    t.integer "post_id",    :limit => 8,          :default => 0, :null => false
    t.string  "meta_key"
    t.text    "meta_value", :limit => 2147483647
  end

  add_index "wp_postmeta", ["meta_key"], :name => "meta_key"
  add_index "wp_postmeta", ["post_id"], :name => "post_id"

  create_table "wp_posts", :primary_key => "ID", :force => true do |t|
    t.integer  "post_author",           :limit => 8,          :default => 0,         :null => false
    t.datetime "post_date",                                                          :null => false
    t.datetime "post_date_gmt",                                                      :null => false
    t.text     "post_content",          :limit => 2147483647,                        :null => false
    t.text     "post_title",                                                         :null => false
    t.text     "post_excerpt",                                                       :null => false
    t.string   "post_status",           :limit => 20,         :default => "publish", :null => false
    t.string   "comment_status",        :limit => 20,         :default => "open",    :null => false
    t.string   "ping_status",           :limit => 20,         :default => "open",    :null => false
    t.string   "post_password",         :limit => 20,         :default => "",        :null => false
    t.string   "post_name",             :limit => 200,        :default => "",        :null => false
    t.text     "to_ping",                                                            :null => false
    t.text     "pinged",                                                             :null => false
    t.datetime "post_modified",                                                      :null => false
    t.datetime "post_modified_gmt",                                                  :null => false
    t.text     "post_content_filtered", :limit => 2147483647,                        :null => false
    t.integer  "post_parent",           :limit => 8,          :default => 0,         :null => false
    t.string   "guid",                                        :default => "",        :null => false
    t.integer  "menu_order",                                  :default => 0,         :null => false
    t.string   "post_type",             :limit => 20,         :default => "post",    :null => false
    t.string   "post_mime_type",        :limit => 100,        :default => "",        :null => false
    t.integer  "comment_count",         :limit => 8,          :default => 0,         :null => false
  end

  add_index "wp_posts", ["post_author"], :name => "post_author"
  add_index "wp_posts", ["post_name"], :name => "post_name"
  add_index "wp_posts", ["post_parent"], :name => "post_parent"
  add_index "wp_posts", ["post_type", "post_status", "post_date", "ID"], :name => "type_status_date"

  create_table "wp_prli_clicks", :force => true do |t|
    t.string   "ip"
    t.string   "browser"
    t.string   "btype"
    t.string   "bversion"
    t.string   "os"
    t.string   "referer"
    t.string   "host"
    t.string   "uri"
    t.integer  "robot",       :limit => 1,  :default => 0
    t.integer  "first_click", :limit => 1,  :default => 0
    t.datetime "created_at",                               :null => false
    t.integer  "link_id"
    t.string   "vuid",        :limit => 25
  end

  add_index "wp_prli_clicks", ["browser"], :name => "browser"
  add_index "wp_prli_clicks", ["btype"], :name => "btype"
  add_index "wp_prli_clicks", ["bversion"], :name => "bversion"
  add_index "wp_prli_clicks", ["first_click"], :name => "first_click"
  add_index "wp_prli_clicks", ["host"], :name => "host"
  add_index "wp_prli_clicks", ["ip"], :name => "ip"
  add_index "wp_prli_clicks", ["link_id"], :name => "link_id"
  add_index "wp_prli_clicks", ["os"], :name => "os"
  add_index "wp_prli_clicks", ["referer"], :name => "referer"
  add_index "wp_prli_clicks", ["robot"], :name => "robot"
  add_index "wp_prli_clicks", ["uri"], :name => "uri"
  add_index "wp_prli_clicks", ["vuid"], :name => "vuid"

  create_table "wp_prli_groups", :force => true do |t|
    t.string   "name"
    t.text     "description"
    t.datetime "created_at",  :null => false
  end

  add_index "wp_prli_groups", ["name"], :name => "name"

  create_table "wp_prli_link_metas", :force => true do |t|
    t.string   "meta_key"
    t.text     "meta_value", :limit => 2147483647
    t.integer  "link_id",                          :null => false
    t.datetime "created_at",                       :null => false
  end

  add_index "wp_prli_link_metas", ["link_id"], :name => "link_id"
  add_index "wp_prli_link_metas", ["meta_key"], :name => "meta_key"

  create_table "wp_prli_links", :force => true do |t|
    t.string   "name"
    t.text     "description"
    t.text     "url"
    t.string   "slug"
    t.boolean  "nofollow",         :default => false
    t.boolean  "track_me",         :default => true
    t.string   "param_forwarding"
    t.string   "param_struct"
    t.string   "redirect_type",    :default => "307"
    t.datetime "created_at",                          :null => false
    t.integer  "group_id"
  end

  add_index "wp_prli_links", ["group_id"], :name => "group_id"
  add_index "wp_prli_links", ["name"], :name => "name"
  add_index "wp_prli_links", ["nofollow"], :name => "nofollow"
  add_index "wp_prli_links", ["param_forwarding"], :name => "param_forwarding"
  add_index "wp_prli_links", ["param_struct"], :name => "param_struct"
  add_index "wp_prli_links", ["redirect_type"], :name => "redirect_type"
  add_index "wp_prli_links", ["slug"], :name => "slug"
  add_index "wp_prli_links", ["track_me"], :name => "track_me"

  create_table "wp_rg_form", :force => true do |t|
    t.string   "title",        :limit => 150,                   :null => false
    t.datetime "date_created",                                  :null => false
    t.boolean  "is_active",                   :default => true, :null => false
  end

  create_table "wp_rg_form_meta", :primary_key => "form_id", :force => true do |t|
    t.text "display_meta",      :limit => 2147483647
    t.text "entries_grid_meta", :limit => 2147483647
  end

  create_table "wp_rg_form_view", :force => true do |t|
    t.integer  "form_id",      :limit => 3,                 :null => false
    t.datetime "date_created",                              :null => false
    t.string   "ip",           :limit => 15
    t.integer  "count",        :limit => 3,  :default => 1, :null => false
  end

  add_index "wp_rg_form_view", ["form_id"], :name => "form_id"

  create_table "wp_rg_lead", :force => true do |t|
    t.integer  "form_id",          :limit => 3,                                                        :null => false
    t.integer  "post_id",          :limit => 8
    t.datetime "date_created",                                                                         :null => false
    t.boolean  "is_starred",                                                     :default => false,    :null => false
    t.boolean  "is_read",                                                        :default => false,    :null => false
    t.string   "ip",               :limit => 39,                                                       :null => false
    t.string   "source_url",       :limit => 200,                                :default => "",       :null => false
    t.string   "user_agent",       :limit => 250,                                :default => "",       :null => false
    t.string   "currency",         :limit => 5
    t.string   "payment_status",   :limit => 15
    t.datetime "payment_date"
    t.decimal  "payment_amount",                  :precision => 19, :scale => 2
    t.string   "transaction_id",   :limit => 50
    t.boolean  "is_fulfilled"
    t.integer  "created_by",       :limit => 8
    t.boolean  "transaction_type"
    t.string   "status",           :limit => 20,                                 :default => "active", :null => false
  end

  add_index "wp_rg_lead", ["form_id"], :name => "form_id"
  add_index "wp_rg_lead", ["status"], :name => "status"

  create_table "wp_rg_lead_detail", :force => true do |t|
    t.integer "lead_id",                     :null => false
    t.integer "form_id",      :limit => 3,   :null => false
    t.float   "field_number",                :null => false
    t.string  "value",        :limit => 200
  end

  add_index "wp_rg_lead_detail", ["form_id"], :name => "form_id"
  add_index "wp_rg_lead_detail", ["lead_id"], :name => "lead_id"

  create_table "wp_rg_lead_detail_long", :primary_key => "lead_detail_id", :force => true do |t|
    t.text "value", :limit => 2147483647
  end

  create_table "wp_rg_lead_meta", :force => true do |t|
    t.integer "lead_id",    :limit => 8,          :null => false
    t.string  "meta_key"
    t.text    "meta_value", :limit => 2147483647
  end

  add_index "wp_rg_lead_meta", ["lead_id"], :name => "lead_id"
  add_index "wp_rg_lead_meta", ["meta_key"], :name => "meta_key"

  create_table "wp_rg_lead_notes", :force => true do |t|
    t.integer  "lead_id",                            :null => false
    t.string   "user_name",    :limit => 250
    t.integer  "user_id",      :limit => 8
    t.datetime "date_created",                       :null => false
    t.text     "value",        :limit => 2147483647
  end

  add_index "wp_rg_lead_notes", ["lead_id", "user_id"], :name => "lead_user_key"
  add_index "wp_rg_lead_notes", ["lead_id"], :name => "lead_id"

  create_table "wp_term_relationships", :id => false, :force => true do |t|
    t.integer "object_id",        :limit => 8, :default => 0, :null => false
    t.integer "term_taxonomy_id", :limit => 8, :default => 0, :null => false
    t.integer "term_order",                    :default => 0, :null => false
  end

  add_index "wp_term_relationships", ["term_taxonomy_id"], :name => "term_taxonomy_id"

  create_table "wp_term_taxonomy", :primary_key => "term_taxonomy_id", :force => true do |t|
    t.integer "term_id",     :limit => 8,          :default => 0,  :null => false
    t.string  "taxonomy",    :limit => 32,         :default => "", :null => false
    t.text    "description", :limit => 2147483647,                 :null => false
    t.integer "parent",      :limit => 8,          :default => 0,  :null => false
    t.integer "count",       :limit => 8,          :default => 0,  :null => false
  end

  add_index "wp_term_taxonomy", ["taxonomy"], :name => "taxonomy"
  add_index "wp_term_taxonomy", ["term_id", "taxonomy"], :name => "term_id_taxonomy", :unique => true

  create_table "wp_terms", :primary_key => "term_id", :force => true do |t|
    t.string  "name",       :limit => 200, :default => "", :null => false
    t.string  "slug",       :limit => 200, :default => "", :null => false
    t.integer "term_group", :limit => 8,   :default => 0,  :null => false
  end

  add_index "wp_terms", ["name"], :name => "name"
  add_index "wp_terms", ["slug"], :name => "slug", :unique => true

  create_table "wp_tts_keyword_stats", :force => true do |t|
    t.string   "keyword",         :limit => 60,                :null => false
    t.datetime "create_time",                                  :null => false
    t.integer  "post_id",                       :default => 0, :null => false
    t.string   "stat_visitor_id", :limit => 32
    t.string   "visitor_id",      :limit => 32
  end

  add_index "wp_tts_keyword_stats", ["keyword"], :name => "keyword"
  add_index "wp_tts_keyword_stats", ["stat_visitor_id"], :name => "stat_visitor_id"

  create_table "wp_tts_online_status", :force => true do |t|
    t.string  "ip_address",       :limit => 20, :default => "", :null => false
    t.integer "last_active_time",               :default => 0,  :null => false
  end

  add_index "wp_tts_online_status", ["ip_address"], :name => "ip_address"

  create_table "wp_tts_referrer_stats", :force => true do |t|
    t.string   "referrer",        :limit => 60,                :null => false
    t.datetime "create_time",                                  :null => false
    t.integer  "post_id",                       :default => 0, :null => false
    t.string   "stat_visitor_id", :limit => 32
    t.string   "visitor_id",      :limit => 32
  end

  add_index "wp_tts_referrer_stats", ["referrer"], :name => "referrer"
  add_index "wp_tts_referrer_stats", ["stat_visitor_id"], :name => "stat_visitor_id"

  create_table "wp_tts_settings", :id => false, :force => true do |t|
    t.text "list_ip_address"
  end

  create_table "wp_tts_trafficstats", :id => false, :force => true do |t|
    t.integer  "stat_post_id",                  :default => 0, :null => false
    t.datetime "stat_date",                                    :null => false
    t.string   "stat_visitor_id", :limit => 32
    t.string   "visitor_id",      :limit => 32
    t.integer  "referrer_id",                   :default => 0
  end

  add_index "wp_tts_trafficstats", ["stat_visitor_id"], :name => "stat_visitor_id"

  create_table "wp_tts_visitors", :force => true do |t|
    t.string  "ip_address",        :limit => 20, :default => "", :null => false
    t.string  "country",           :limit => 50
    t.string  "browser"
    t.string  "platform"
    t.text    "page_url",                                        :null => false
    t.integer "page_id",                         :default => 0,  :null => false
    t.integer "time_visited",                    :default => 0,  :null => false
    t.integer "time_last_visited",               :default => 0,  :null => false
    t.integer "num_visits",                      :default => 0,  :null => false
  end

  add_index "wp_tts_visitors", ["ip_address"], :name => "ip_address"

  create_table "wp_usermeta", :primary_key => "umeta_id", :force => true do |t|
    t.integer "user_id",    :limit => 8,          :default => 0, :null => false
    t.string  "meta_key"
    t.text    "meta_value", :limit => 2147483647
  end

  add_index "wp_usermeta", ["meta_key"], :name => "meta_key"
  add_index "wp_usermeta", ["user_id"], :name => "user_id"

  create_table "wp_users", :primary_key => "ID", :force => true do |t|
    t.string   "user_login",          :limit => 60,  :default => "", :null => false
    t.string   "user_pass",           :limit => 64,  :default => "", :null => false
    t.string   "user_nicename",       :limit => 50,  :default => "", :null => false
    t.string   "user_email",          :limit => 100, :default => "", :null => false
    t.string   "user_url",            :limit => 100, :default => "", :null => false
    t.datetime "user_registered",                                    :null => false
    t.string   "user_activation_key", :limit => 60,  :default => "", :null => false
    t.integer  "user_status",                        :default => 0,  :null => false
    t.string   "display_name",        :limit => 250, :default => "", :null => false
  end

  add_index "wp_users", ["user_login"], :name => "user_login_key"
  add_index "wp_users", ["user_nicename"], :name => "user_nicename"

  create_table "wp_wct_cron", :force => true do |t|
    t.string  "schedule", :limit => 0, :default => "d", :null => false
    t.text    "command",                                :null => false
    t.integer "nextrun",               :default => 0,   :null => false
    t.text    "error"
    t.string  "active",   :limit => 0, :default => "1", :null => false
  end

  create_table "wp_wct_setup", :force => true do |t|
    t.string  "name",        :limit => 32,  :default => "",    :null => false
    t.integer "table_id",                                      :null => false
    t.text    "t_setup"
    t.text    "e_setup"
    t.text    "o_setup"
    t.string  "sheme",       :limit => 0,   :default => "0",   :null => false
    t.string  "overlay",     :limit => 0,   :default => "0",   :null => false
    t.string  "headerline",  :limit => 0,   :default => "1",   :null => false
    t.text    "header"
    t.text    "headersort"
    t.text    "vortext"
    t.text    "nachtext"
    t.string  "sort",        :limit => 32,  :default => "id",  :null => false
    t.string  "sortB",       :limit => 0,   :default => "ASC", :null => false
    t.string  "searchaddon", :limit => 120
  end

  add_index "wp_wct_setup", ["name"], :name => "name", :unique => true

  create_table "wp_websitez_stats", :primary_key => "created_at", :force => true do |t|
    t.integer "id",          :null => false
    t.text    "data",        :null => false
    t.integer "device_type", :null => false
  end

  add_index "wp_websitez_stats", ["id"], :name => "id", :unique => true

  create_table "wp_wpjf3_mr_access_keys", :force => true do |t|
    t.string   "name",       :limit => 100
    t.string   "access_key", :limit => 20
    t.string   "email",      :limit => 100
    t.datetime "created_at",                               :null => false
    t.integer  "active",                    :default => 1, :null => false
  end

  create_table "wp_wpjf3_mr_unrestricted_ips", :force => true do |t|
    t.string   "name",       :limit => 100
    t.string   "ip_address", :limit => 20
    t.datetime "created_at",                               :null => false
    t.integer  "active",                    :default => 1, :null => false
  end

  create_table "zip_ad_masters", :force => true do |t|
    t.string   "lat"
    t.string   "longitude"
    t.datetime "created_at"
    t.datetime "updated_at"
  end

end
