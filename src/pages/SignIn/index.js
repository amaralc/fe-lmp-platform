/* --------------------------------- IMPORTS ---------------------------------*/
import React from 'react';
import { Link } from 'react-router-dom';
import { Form, Input } from '@rocketseat/unform';
import * as Yup from 'yup';

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
  function handleSubmit(data) {
    console.tron.log(data);
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
