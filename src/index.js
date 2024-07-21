import { createRoot, StrictMode } from '@wordpress/element';
import Dashboard from './Dashboard';

import './styles/tailwind.css'; 

const domElement = document.getElementById('wp-aws-ses-emailer-settings');

createRoot(domElement).render(<StrictMode><Dashboard/></StrictMode>);