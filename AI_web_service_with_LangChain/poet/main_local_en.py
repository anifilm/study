import streamlit as st
from langchain.llms import CTransformers

llm = CTransformers(
    model="C:/temp/llama-2-7b-chat.ggmlv3.q8_0.bin", model_type="llama"
)

st.title('AI Poet')
content = st.text_input('시의 주제를 제시해 주세요.')
st.write('시의 주제는', content)

if st.button('작성 요청하기'):
    with st.spinner('시인이 주제에 대해 고민하고 있습니다...'):
        result = llm.predict("write a poet about " + content)
        st.write(result)
