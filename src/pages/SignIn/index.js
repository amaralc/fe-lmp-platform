/* --------------------------------- IMPORTS ---------------------------------*/
import React from 'react';
import { useDispatch } from 'react-redux';
import { Link } from 'react-router-dom';
import { Form, Input } from '@rocketseat/unform';
import * as Yup from 'yup';

import { SignInRequest, signInRequest } from '~/store/modules/auth/actions';

import logo from '~/assets/logo.svg';

/* --------------------------------- CONTENT ---------------------------------*/
const schema = Yup.object().shape({
  email: Yup.string()
    .email('Um email válido é necessário')
    .required('Digite o seu email'),
  password: Yup.string().required('Digite sua senha'),
});

/* --------------------------------- EXPORTS ---------------------------------*/
export default function SignIn() {
  const dispatch = useDispatch();

  function handleSubmit({ email, password }) {
    dispatch(signInRequest(email, password));
  }
  return (
    <>
      <img src={logo} alt="GoBarber" />
      <Form schema={schema} onSubmit={handleSubmit}>
        <Input name="email" type="email" placeholder="Seu email" />
        <Input name="password" type="password" placeholder="Sua senha" />

        <button type="submit">Acessar</button>
        <Link to="/register"> Cadastrar-se </Link>
      </Form>
    </>
  );
}
