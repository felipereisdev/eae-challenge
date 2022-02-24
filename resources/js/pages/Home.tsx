import React from 'react';
import { Job } from '../components/Job';

export function Home() {
  return (
    <div className="w-screen h-screen bg-slate-200">
      <header className="w-full bg-header h-32">
        <div className="max-w-[70rem] h-32 flex items-center justify-between my-0 mx-auto py-0 px-8">
          <h1 className="font-black text-3xl text-white">EAE Jobs</h1>

          <div className="flex items-center justify-center">
            <div className="flex flex-col text-right">
              <span className="text-white text-lg font-bold">Felipe Reis</span>
              <span className="text-xs font-normal text-custom-gray">
                Show profile
              </span>
            </div>
            <img
              src="https://avatars.githubusercontent.com/u/7799406?v=4"
              alt="profile photo"
              className="w-14 h-14 rounded-full border-2 border-custom-orange ml-5"
            />
          </div>
        </div>
      </header>

      <main className="max-w-[70rem] flex items-center justify-between my-0 mx-auto py-0 px-8 mt-14">
        <div className="w-full grid grid-cols-1 gap-5">
          <Job title="Photosnap" />
          <Job title="Photosnap" />
          <Job title="Photosnap" />
        </div>
      </main>
    </div>
  );
}
