import React from 'react';
import { Link } from 'react-router-dom';

const MenuBar = () => {
  return (
    <div align="center">
      <table>
        <tbody>
          <tr>
            <td width="120"><Link to="/">홈</Link></td>
          </tr>
        </tbody>
      </table>
    </div>
  );
}

export default MenuBar;
