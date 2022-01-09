import '../styles/globals.css';
import '../src/config/firebase.config';
import { AuthProvider } from '../src/hook/auth';
import AuthStateChanged from '../src/layout/AuthStateChanged';

const MyApp = ({ Component, pageProps }) => {
  return (
    <AuthProvider>
      <AuthStateChanged>
        <Component {...pageProps} />
      </AuthStateChanged>
    </AuthProvider>
  );
};

export default MyApp;
