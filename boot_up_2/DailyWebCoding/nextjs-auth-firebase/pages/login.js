import useAuth from '../src/hook/auth';
import { withPublic } from '../src/hook/route';

function Login({ auth }) {
  const { user, loginWithGoogle, error } = useAuth();
  return (
    <div>
      {error && <h1>{error}</h1>}
      <button onClick={loginWithGoogle}>Login with Google</button>
      <h1>{user?.uid}</h1>
    </div>
  );
};

export default withPublic(Login);
