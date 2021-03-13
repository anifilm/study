ActiveAdmin.register Pack do

  # See permitted parameters documentation:
  # https://github.com/activeadmin/activeadmin/blob/master/docs/2-resource-customization.md#setting-up-strong-parameters
  #
  # Uncomment all parameters which should be permitted for assignment
  #
  # permit_params :image, :product_name, :company_name, :desc
  #
  # or
  #
  # permit_params do
  #   permitted = [:image, :product_name, :company_name, :desc]
  #   permitted << :other if params[:action] == 'create' && current_user.admin?
  #   permitted
  # end

  # new, edit 커스텀 부분
  form do |f|
    f.inputs do
      f.input :image, as: :file # 파일 업로드로 재구성
      f.input :product_name
      f.input :company_name
      f.input :desc
    end
    f.actions
  end

end
