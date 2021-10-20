import Link from 'next/link';
import { useState, useEffect, useRef } from 'react';
import fetch from 'isomorphic-unfetch';
import { Button, Form, Loader } from 'semantic-ui-react';
import { useRouter } from 'next/router';

const NewNote = () => {
  const [form, setForm] = useState({ title: '', description: '' });
  const [isSubmitting, setIsSubmitting] = useState(false);
  const [errors, setErrors] = useState({});
  const [totalChar, setTotalChar] = useState(0);
  const router = useRouter();
  const nowChar = useRef();

  useEffect(() => {
    if (isSubmitting) {
      if (Object.keys(errors).length === 0) {
        createNote();
      } else {
        setIsSubmitting(false);
      }
    }
  }, [errors]);

  const createNote = async () => {
    try {
      const res = await fetch('http://localhost:3000/api/notes', {
        method: 'POST',
        headers: {
          Accept: 'application/json',
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(form),
      });
      router.push('/');
    } catch (error) {
      console.log(error);
    }
  };
  const handleSubmit = (e) => {
    e.preventDefault();
    let errs = validate();
    setErrors(errs);
    setIsSubmitting(true);
  };
  const handleChange = (e) => {
    setForm({
      ...form,
      [e.target.name]: e.target.value,
    });
  };
  const validate = () => {
    let err = {};

    if (!form.title) {
      err.title = 'Title is required';
    }
    if (!form.description) {
      err.description = 'Description is required';
    }

    return err;
  };

  const checkChar = (e) => {
    const maxChar = 200; // 최대 200바이트
    const text_val = e.target.value; // 입력한 문자
    const text_len = text_val.length;  // 입력한 문자수

    setTotalChar(text_len);
    if (text_len > maxChar) {
      alert('최대 200자 까지만 입력가능합니다.');
      nowChar.current.style.color = 'red';
      e.target.value = text_val.substr(0, maxChar);
      setTotalChar(maxChar);
    } else if (text_len > maxChar * 0.95) {
      nowChar.current.style.color = 'red';
    } else if (text_len > maxChar * 0.9) {
      nowChar.current.style.color = 'orange';
    } else {
      nowChar.current.style.color = 'green';
    }
  };

  return (
    <div className="form-container">
      <h1>Create Note</h1>
      <div>
        {isSubmitting ? (
          <Loader active inline="centered" />
        ) : (
          <Form onSubmit={handleSubmit}>
            <Form.Input
              fluid
              error={
                errors.title
                  ? { content: 'Please enter a title', pointing: 'below' }
                  : null
              }
              label="Title"
              placeholder="Title"
              name="title"
              onChange={handleChange}
            />
            <Form.TextArea
              rows={10}
              fluid
              label="Descriprtion"
              placeholder="Description"
              name="description"
              error={
                errors.description
                  ? { content: 'Please enter a description', pointing: 'below' }
                  : null
              }
              onKeyUp={checkChar}
              onChange={handleChange}
            />
            <div style={{ float: 'right' }}>
              <sup>
                  (<span ref={nowChar}>{totalChar}</span>/200)
              </sup>
            </div>
            <Button primary type="submit" style={{ marginTop: '10px' }}>
              Create
            </Button>
          </Form>
        )}
      </div>
    </div>
  );
};

export default NewNote;
