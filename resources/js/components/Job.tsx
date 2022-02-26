import React from 'react';

import { Badge } from './Badge';
import { Tech } from './Tech';

interface JobProps {
  title: string;
}

export function Job({ title }: JobProps) {
  return (
    <div className="w-full h-auto lg:h-32 bg-white shadow-lg rounded-md flex flex-col lg:flex-row items-center justify-between p-5 lg:p-7">
      <div className="flex items-center h-auto lg:h-32">
        <img
          src="https://avatars.githubusercontent.com/u/7799406?v=4"
          alt="Job Photo"
          className="w-12 lg:w-16 h-12 lg:h-16 rounded-full"
        />
        <div className="ml-5 flex flex-col gap-2">
          <div className="flex">
            <h2 className="text-base text-custom-orange font-bold mr-4">
              {title}
            </h2>

            <Badge title="NEW!" customClasses="bg-custom-orange" />
            <Badge title="FEATURED" customClasses="ml-2 bg-header" />
          </div>

          <p className="text-lg text-header font-bold">
            Senior Frontend Developer
          </p>

          <div className="flex items-center">
            <span className="text-base text-gray-400 mr-6">2d ago</span>
            <ul className="flex list-disc text-base text-gray-400">
              <li>Part time</li>
              <li className="ml-6">Remote</li>
            </ul>
          </div>
        </div>
      </div>
      <div className="w-full flex justify-center lg:justify-end flex-wrap gap-2 pt-3">
        <Tech title="Fullstack" />
        <Tech title="Python" />
        <Tech title="React" />
        <Tech title="Junior" />
        <Tech title="Junior" />
      </div>
    </div>
  );
}
