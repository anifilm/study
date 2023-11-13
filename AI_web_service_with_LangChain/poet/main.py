import os
import streamlit as st
from dotenv import load_dotenv
from langchain.chat_models import ChatOpenAI

load_dotenv()
OPENAI_API_KEY = os.getenv("OPENAI_API_KEY")
chat_model = ChatOpenAI()

st.title('인공지능 시인')
content = st.text_input('시의 주제를 제시해 주세요.')
st.write('시의 주제는', content)

if st.button('작성 요청하기'):
    with st.spinner('시인이 주제에 대해 고민하고 있습니다...'):
        result = chat_model.predict(content + "에 대한 시를 써줘")
        st.write(result)
