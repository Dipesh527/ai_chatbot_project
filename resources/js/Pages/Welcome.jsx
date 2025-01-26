import { Head, Link } from '@inertiajs/react';

export default function Welcome({ auth, laravelVersion, phpVersion }) {
    const handleImageError = () => {
        document
            .getElementById('screenshot-container')
            ?.classList.add('!hidden');
        document.getElementById('docs-card')?.classList.add('!row-span-1');
        document
            .getElementById('docs-card-content')
            ?.classList.add('!flex-row');
        document.getElementById('background')?.classList.add('!hidden');
    };

    return (
        <>
            <Head title="Dipesh Tamang AI Chatbot" />
    
              
                      <header className="relative bg-cover bg-center h-screen flex items-center text-white"style={{ backgroundImage: "url('/images/logo.jpg.jpg')" }} >
                               
                            <div className="container mx-auto z-10">
                                {/* Title */}
                                <h1 className="text-4xl lg:text-6xl mx-4 font-bold">
                                Revolutionizing Customer  <br />
                                Support with AI
                                </h1>
                                {/* Navigation Links */}
                                <nav className="absolute top-0 right-0 mt-6 mr-6 flex space-x-6 text-white text-lg">
                                    <a href="#home" className="text-white hover:text-blue-300 transition">Home</a>
                                    <a href="#about" className="text-white hover:text-blue-300 transition">About</a>
                                    <a href="#contact" className="text-white hover:text-blue-300 transition">Contact</a>

                                    {auth.user ? (
                                        <a href={route('dashboard')} className="px-4 py-2 bg-white text-blue-600 font-semibold rounded-lg hover:bg-blue-100 transition">
                                            Dashboard
                                        </a>
                                    ) : (
                                        <>
                                            <a href={route('login')} className="px-4 py-2 bg-white text-blue-600 font-semibold rounded-lg hover:bg-blue-100 transition">
                                                Login
                                            </a>
                                            <a href={route('register')} className="px-4 py-2 bg-blue-700 text-white font-semibold rounded-lg hover:bg-blue-800 transition">
                                                Register
                                            </a>
                                        </>
                                    )}
                                </nav>
                            </div>
                            
                        </header>


                        <section className="bg-gray-100 py-20">
                            <div className="container mx-auto grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
                                {/* Left Column: Image */}
                                <div className="flex p-20 justify-center">
                                <img
                                    src="/images/chatbot-icon.jpg"
                                    alt="Chatbot Icon"
                                    className="max-w-full rounded-lg shadow-lg"
                                />
                                </div>

                                {/* Right Column: Text */}
                                <div>
                                <h2 className="text-4xl font-bold text-800 mb-4">
                                    Experience the Future of Web Applications with Intelligent Chatbots
                                </h2>

                                <p className="text-gray-700 mb-6">
                                    AI-powered chatbots revolutionize customer support by providing intelligent, real-time assistance through seamless web application integration. They enhance user engagement, automate responses, and deliver personalized solutions with efficiency and accuracy.
                                </p>
                               
                                </div>
                            </div>
                            </section>

                        <footer className="bg-gray-800 text-white py-8">
                            <div className="container mx-auto text-center">
                                <p className="mb-4">Your Virtual Assistant, Always Ready to Help</p>
                                <div className="flex justify-center space-x-4">
                                <a href="#" className="text-white hover:text-gray-400">
                                    <i className="fab fa-facebook fa-lg"></i>
                                </a>
                                <a href="#" className="text-white hover:text-gray-400">
                                    <i className="fab fa-twitter fa-lg"></i>
                                </a>
                                <a href="#" className="text-white hover:text-gray-400">
                                    <i className="fab fa-instagram fa-lg"></i>
                                </a>
                                <a href="#" className="text-white hover:text-gray-400">
                                    <i className="fab fa-linkedin fa-lg"></i>
                                </a>
                                </div>
                            </div>
                            </footer>

        
        </>
    );
}
