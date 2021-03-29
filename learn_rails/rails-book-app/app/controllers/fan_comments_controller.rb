class FanCommentsController < ApplicationController
  before_action :set_fan_comment, only: %i[ show edit update destroy ]

  # GET /fan_comments or /fan_comments.json
  def index
    @fan_comments = FanComment.all
  end

  # GET /fan_comments/1 or /fan_comments/1.json
  def show
  end

  # GET /fan_comments/new
  def new
    @fan_comment = FanComment.new
  end

  # GET /fan_comments/1/edit
  def edit
  end

  # POST /fan_comments or /fan_comments.json
  def create
    @fan_comment = FanComment.new(fan_comment_params)

    respond_to do |format|
      if @fan_comment.save
        format.html { redirect_to @fan_comment, notice: "Fan comment was successfully created." }
        format.json { render :show, status: :created, location: @fan_comment }
      else
        format.html { render :new, status: :unprocessable_entity }
        format.json { render json: @fan_comment.errors, status: :unprocessable_entity }
      end
    end
  end

  # PATCH/PUT /fan_comments/1 or /fan_comments/1.json
  def update
    respond_to do |format|
      if @fan_comment.update(fan_comment_params)
        format.html { redirect_to @fan_comment, notice: "Fan comment was successfully updated." }
        format.json { render :show, status: :ok, location: @fan_comment }
      else
        format.html { render :edit, status: :unprocessable_entity }
        format.json { render json: @fan_comment.errors, status: :unprocessable_entity }
      end
    end
  end

  # DELETE /fan_comments/1 or /fan_comments/1.json
  def destroy
    @fan_comment.destroy
    respond_to do |format|
      format.html { redirect_to fan_comments_url, notice: "Fan comment was successfully destroyed." }
      format.json { head :no_content }
    end
  end

  private
    # Use callbacks to share common setup or constraints between actions.
    def set_fan_comment
      @fan_comment = FanComment.find(params[:id])
    end

    # Only allow a list of trusted parameters through.
    def fan_comment_params
      params.require(:fan_comment).permit(:author_no, :name, :body, :deleted)
    end
end
