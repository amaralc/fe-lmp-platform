import React from 'react';
import { Link } from 'react-router-dom';
import { Form, Input } from '@rocketseat/unform';
import * as Yup from 'yup';

import logo from '~/assets/logo.svg';

/* --------------------------------- CONTENT ---------------------------------*/
const schema = Yup.object().shape({
  name: Yup.string().required('Digite seu nome'),
  email: Yup.string()
    .email('Um email válido é necessário')
    .required('Digite o seu email'),
  password: Yup.string()
    .min(6, 'Sua senha deve ter, no mínimo, 6 caracteres')
    .required('Digite sua senha'),
});

/* --------------------------------- EXPORTS ---------------------------------*/
export default function SignUp() {
  function handleSubmit(data) {
    console.tron.log(data);
  }
  return (
    <>
      <img src={logo} alt="GoBarber" />
      <Form schema={schema} onSubmit={handleSubmit}>
        <Input name="name" placeholder="Nome completo" />
        <Input name="email" type="email" placeholder="Seu email" />
        <Input name="password" type="password" placeholder="Sua senha" />

        <button type="submit">Criar conta</button>
        <Link to="/"> Já estou cadastrado </Link>
      </Form>
    </>
  );
}
