import { Navbar, Content} from "./components";

const Dashboard = () => {
  return (
	<div className="flex gap-5 min-h-full">
   <Navbar />
   <Content />
  </div>
  )
}

export default Dashboard;