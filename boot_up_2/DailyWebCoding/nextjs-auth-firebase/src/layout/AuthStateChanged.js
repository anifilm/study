import { useEffect, useState } from 'react';
import firebase from 'firebase/app';
import 'firebase/auth';
import useAuth from '../hook/auth';

export default function AuthStateChanged({ children }) {
  const { setUser } = useAuth();
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    firebase.auth().onAuthStateChanged((user) => {
      setUser(user);
      setLoading(false);
    });
    // eslint-disable-next-line
  }, []);

  if (loading) {
    return <h1>Loading...</h1>;
  }

  return children;
}
