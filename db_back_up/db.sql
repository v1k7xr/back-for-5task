--
-- PostgreSQL database dump
--

-- Dumped from database version 10.15 (Ubuntu 10.15-1.pgdg18.04+1)
-- Dumped by pg_dump version 10.15 (Ubuntu 10.15-1.pgdg18.04+1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: doctrine_migration_versions; Type: TABLE; Schema: public; Owner: resume_user
--

CREATE TABLE public.doctrine_migration_versions (
    version character varying(191) NOT NULL,
    executed_at timestamp(0) without time zone DEFAULT NULL::timestamp without time zone,
    execution_time integer
);


ALTER TABLE public.doctrine_migration_versions OWNER TO resume_user;

--
-- Name: resume; Type: TABLE; Schema: public; Owner: resume_user
--

CREATE TABLE public.resume (
    id integer NOT NULL,
    fullname character varying(255) NOT NULL,
    city character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    phone_number character varying(15) NOT NULL,
    resume_status character varying(50),
    profession character varying(255) NOT NULL,
    image_url character varying(1100) NOT NULL,
    date_birth date NOT NULL,
    education_type character varying(35) NOT NULL,
    education_list json,
    salary numeric(7,2) NOT NULL,
    skills character varying(255) NOT NULL,
    about text
);


ALTER TABLE public.resume OWNER TO resume_user;

--
-- Name: resume_id_seq; Type: SEQUENCE; Schema: public; Owner: resume_user
--

CREATE SEQUENCE public.resume_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.resume_id_seq OWNER TO resume_user;

--
-- Name: doctrine_migration_versions doctrine_migration_versions_pkey; Type: CONSTRAINT; Schema: public; Owner: resume_user
--

ALTER TABLE ONLY public.doctrine_migration_versions
    ADD CONSTRAINT doctrine_migration_versions_pkey PRIMARY KEY (version);


--
-- Name: resume resume_pkey; Type: CONSTRAINT; Schema: public; Owner: resume_user
--

ALTER TABLE ONLY public.resume
    ADD CONSTRAINT resume_pkey PRIMARY KEY (id);


--
-- PostgreSQL database dump complete
--

