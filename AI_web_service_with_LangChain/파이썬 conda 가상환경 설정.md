## 파이썬 conda 가상환경 설정


# .bashrc - conda activate 설정
source ~/anaconda3/etc/profile.d/conda.sh
alias activate="conda activate"


# 파이썬 가상 환경 생성 (64bit)

$ conda create --name ai python=3.9


# 가상 환경 확인

$ conda env list


# 가상 환경 진입 / 해제 (리눅스 맥 콘솔)

$ conda activate ai

$ conda deactivate


# 가상 환경 진입 / 해제 (윈도우 커맨드 라인)

> conda activate ai

> conda deactivate


# 패키지 관리

$ pip freeze > requirements.txt

$ pip install -r requirements.txt
