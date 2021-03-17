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

  index do
    selectable_column

    id_column

    column :image do |pack|
      if pack.image.attached?
        image_tag url_for(pack.image), class: "preview_img"
      else
        "이미지 없음"
      end
    end
    column :product_name
    column :company_name

    actions
  end

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

  # show 수정하는 부분
  show do
    attributes_table do
      row :id
      row :image do |pack|
        if pack.image.attached?
          image_tag url_for(pack.image), class: "small_img"
        else
          "이미지 없음"
        end
      end
      row :product_name
      row :company_name
      row :desc
    end
  end

end
