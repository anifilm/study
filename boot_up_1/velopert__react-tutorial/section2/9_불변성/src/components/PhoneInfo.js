import React, { Component } from 'react';

class PhoneInfo extends Component {
  static defaultProps = {
    info: {
      id: 0,
      name: '이름',
      phone: '010-0000-0000',
    },
  };

  state = {
    // 우리는 수정 버튼을 눌렀을 떄 editing 값을 true로 설정해 줄 것입니다.
    // 이 값이 true 일 때에는, 기존에 텍스트 형태로 보여주던 값들을
    // input 형태로 보여주게 됩니다.
    editing: false,
    canceled: false,
    // input 의 값은 유동적이겠지요? input 값을 담기 위해서 각 필드를 위한 값도
    // 설정합니다.
    name: '',
    phone: '',
  };

  // editing 값을 반전시키는 함수
  // true -> false, false -> true
  handleToggleEdit = () => {
    const { editing } = this.state;
    this.setState({
      editing: !editing
    });
  };
  // input 에서 onChange 이벤트가 발생 될 때 호출되는 함수
  handleChange = (e) => {
    const { name, value } = e.target;
    this.setState({
      [name]: value
    });
  };
  handleCanceled = () => {
    // 수정모드에서 취소버튼 클릭시
    this.setState({
      canceled: true
    });
    this.handleToggleEdit();
  }
  handleKeyUp = (e) => {
    if (e.key === 'Enter') {
      this.handleToggleEdit();
    }
  }
  handleRemove = () => {
    // 삭제 버튼이 클릭되면 onRemove에 id 넣어서 호출
    const { info, onRemove } = this.props;
    onRemove(info.id);
  };

  componentDidUpdate(prevProps, prevState) {
    if (this.state.canceled) {
      // 수정모드에서 취소버튼 클릭시, 상태 변화 없음
      // 상태값은 원래대로 되돌림
      this.setState({
        canceled: false
      });
    } else {
      // 여기서는, editing 값이 바뀔 때 처리 할 로직이 적혀있습니다.
      // 수정을 눌렀을땐, 기존의 값이 input에 나타나고,
      // 수정을 적용할땐, input 의 값들을 부모한테 전달해줍니다.
      const { info, onUpdate } = this.props;
      if (!prevState.editing && this.state.editing) {
        // editing 값이 false -> true 로 전환 될 때
        // info의 값을 state에 넣어준다
        this.setState({
          name: info.name,
          phone: info.phone,
        });
      }
      if (prevState.editing && !this.state.editing) {
        // editing 값이 true -> false 로 전환 될 때
        // 수정 내용 적용
        onUpdate(info.id, {
          name: this.state.name,
          phone: this.state.phone,
        });
      }
    }
  }

  shouldComponentUpdate(nextProps, nextState) {
    // 수정 상태가 아니고, info 값이 같다면 리렌더링 안함
    if (!this.state.editing
        && !nextState.editing
        && nextProps.info === this.props.info) {
      return false;
    }
    // 나머지 경우엔 리렌더링함
    return true;
  }

  render() {
    console.log('render PhoneInfo ' + this.props.info.id);

    const style = {
      border: '1px solid gray',
      width: '390px',
      marginTop: '20px',
      padding: '10px 16px',
      lineHeight: 1.8,
    };
    const styleInput = {
      padding: '5px',
      marginRight: '5px',
      marginTop: '12px',
      marginBottom: '14px',
    };

    const { editing } = this.state;
    if (editing) {
      return (
        <div style={style}>
          <input
            style={styleInput}
            name="name"
            placeholder="이름"
            value={this.state.name}
            onChange={this.handleChange}
            onKeyUp={this.handleKeyUp}
          />
          <input
            style={styleInput}
            name="phone"
            placeholder="전화번호"
            value={this.state.phone}
            onChange={this.handleChange}
            onKeyUp={this.handleKeyUp}
          />
          <button
            onClick={this.handleCanceled}
            style={{
              border: '1px solid slategray ',
              borderRadius: '3px',
              marginTop: '10px',
              padding: '5px 15px',
              background: 'slategray ',
              color: 'white',
            }}
          >
            취소
          </button>
          <button
            onClick={this.handleToggleEdit}
            style={{
              border: '1px solid dodgerblue',
              borderRadius: '3px',
              marginTop: '10px',
              marginLeft: '5px',
              padding: '5px 15px',
              background: 'dodgerblue',
              color: 'white',
            }}
          >
            적용
          </button>
        </div>
      );
    }

    // 일반 모드
    const { name, phone } = this.props.info;
    return (
      <div style={style}>
        <div><b>{name}</b></div>
        <div>{phone}</div>
        <button
          onClick={this.handleToggleEdit}
          style={{
            border: '1px solid dodgerblue',
            borderRadius: '3px',
            marginTop: '10px',
            padding: '5px 15px',
            background: 'dodgerblue',
            color: 'white',
          }}
        >
          수정
        </button>
        <button
          onClick={this.handleRemove}
          style={{
            border: '1px solid red',
            borderRadius: '3px',
            marginTop: '10px',
            marginLeft: '5px',
            padding: '5px 15px',
            background: 'red',
            color: 'white',
          }}
        >
          삭제
        </button>
      </div>
    );
  }
}

export default PhoneInfo;
