import React, { useContext, useState } from 'react';
import { v4 as uuidv4 } from 'uuid';
import { FilterContext } from '../contexts/FilterContext';

import { Filter } from '../interfaces/Filter';
import { Jobs } from '../interfaces/Jobs';

import { Badge } from './Badge';
import { Tech } from './Tech';

interface JobProps {
  job: Jobs;
}

export function Job({ job }: JobProps) {
  const { filters, handleSetFilters } = useContext(FilterContext);

  function handleSelectFilter(filter: string) {
    const filterExists = filters.find((f) => f.name === filter);

    if (filterExists !== undefined) {
      return;
    }

    const newFilter: Filter = {
      id: uuidv4(),
      name: filter,
    };

    handleSetFilters(filters, newFilter);
  }

  return (
    <div className="w-full h-auto lg:h-32 bg-white shadow-lg rounded-md flex flex-col lg:flex-row items-center justify-between p-5 lg:p-7">
      <div className="w-full flex items-center h-auto lg:h-32">
        <img
          src={job.company?.logo}
          alt={job.company?.name}
          className="w-12 lg:w-16 h-12 lg:h-16 rounded-full"
        />
        <div className="ml-5 flex flex-col gap-2">
          <div className="flex">
            <h2 className="text-base text-custom-orange font-bold mr-4">
              {job.company?.name}
            </h2>

            {!!job.new && (
              <Badge title="NEW!" customClasses="bg-custom-orange" />
            )}
            {!!job.featured && (
              <Badge title="FEATURED" customClasses="ml-2 bg-header" />
            )}
          </div>

          <p
            className="text-lg text-header font-bold cursor-pointer"
            onClick={() => handleSelectFilter(job.title)}
          >
            {job.title}
          </p>

          <div className="flex items-center">
            <span className="text-base text-gray-400 mr-6">
              {job.created_at}
            </span>
            <ul className="flex list-disc text-base text-gray-400">
              <li>{job.contract}</li>
              <li className="ml-6">{job.location}</li>
            </ul>
          </div>
        </div>
      </div>
      <div className="w-full flex justify-center lg:justify-end flex-wrap gap-2 pt-3">
        {job.languages.map((language) => (
          <Tech
            title={language.name}
            onClick={() => handleSelectFilter(language.name)}
            key={language.name}
          />
        ))}

        {job.tools.map((tool) => (
          <Tech
            title={tool.name}
            onClick={() => handleSelectFilter(tool.name)}
            key={tool.name}
          />
        ))}
      </div>
    </div>
  );
}
