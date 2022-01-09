import '../styles/globals.css';
import '../src/config/firebase.config';
import { AuthProvider } from '../src/hook/auth';

const MyApp = ({ Component, pageProps }) => {
  return (
    <AuthProvider>
      <Component {...pageProps} />
    </AuthProvider>
  );
};

export default MyApp;
