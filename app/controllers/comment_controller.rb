class CommentController < ApplicationController

	#before_filter :require_user

  def create
  	#render :text=>"<pre>"+params.to_yaml and return
  	@user= User.find(params[:u_id].to_i)
  	if !@user.blank?
  	@comment= Comment.new(:user_id=>params[:u_id],:user_comment=>params[:comment_text],:pin_id=>params[:pin_id].to_i)

  	@comment.save
  	end
    @coments= Comment.where(:pin_id=>params[:pin_id])
    render :layout => false ,:action => :show_comments
  	#redirect_to :back
  end

  def update
  end

  def delete
  end

  def new
  end

  def show_comments
    @pin= params[:pin_id]
    @coments= Comment.where(:pin_id=>params[:pin_id])
    render :layout => false
  end

end
