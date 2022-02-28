import React, { useEffect, useState } from 'react';

import { api } from '../api';
import { Jobs } from '../interfaces/Jobs';
import { Filter } from '../interfaces/Filter';

import { Job } from '../components/Job';
import { Tech } from '../components/Tech';
import { FilterContext } from '../contexts/FilterContext';

export function Home() {
  const [jobs, setJobs] = useState<Jobs[]>([]);
  const [sort, setSort] = useState<'asc' | 'desc'>('asc');
  const [filters, setFilters] = useState<Filter[]>(() => {
    const storagedFilters = localStorage.getItem('@EAEJobs:filters');

    if (storagedFilters) {
      return JSON.parse(storagedFilters);
    }

    return [];
  });

  useEffect(() => {
    api.post('/jobs', { filters }).then((response) => setJobs(response.data));
  }, [filters]);

  function handleSetFilters(filtersData: Filter[], filter?: Filter) {
    let newFilters = [];

    if (filter) {
      newFilters = [...filters, filter];
    } else {
      newFilters = filtersData;
    }

    setFilters(newFilters);
    localStorage.setItem('@EAEJobs:filters', JSON.stringify(newFilters));
  }

  function handleClearFilters() {
    setFilters([]);
    localStorage.removeItem('@EAEJobs:filters');
  }

  function handleOrderJobs(order: 'asc' | 'desc') {
    setSort(order);

    if (order === 'asc') {
      const ascOrderJobs = jobs.sort((a: Jobs, b: Jobs) => {
        return a.title.toLowerCase().localeCompare(b.title.toLowerCase());
      });

      setJobs([...ascOrderJobs]);
      return;
    }

    const descOrderJobs = jobs.sort((a: Jobs, b: Jobs) => {
      return b.title.toLowerCase().localeCompare(a.title.toLowerCase());
    });

    setJobs([...descOrderJobs]);
  }

  return (
    <FilterContext.Provider value={{ filters, handleSetFilters }}>
      <div className="w-screen pb-8 min-h-screen bg-slate-200">
        <header className="w-full bg-header h-40">
          <div className="max-w-[70rem] h-32 flex items-center justify-between my-0 mx-auto py-0 px-8">
            <h1 className="font-black text-3xl text-white">EAE Jobs</h1>

            <div className="flex items-center justify-center">
              <div className="flex flex-col text-right">
                <span className="text-white text-lg font-bold">
                  Felipe Reis
                </span>
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

        <main className="max-w-[70rem] flex flex-col items-center justify-between my-0 mx-auto py-0 px-8 -mt-10">
          <div className="w-full bg-white min-h-[5rem] lg:h-20 shadow-lg rounded-md flex items-center justify-between px-5 lg:px-7">
            <div className="min-h-[5rem] lg:h-20 flex items-center flex-wrap gap-2 py-2">
              {filters.length > 0 ? (
                filters.map((filter) => (
                  <Tech title={filter.name} key={filter.id} filter />
                ))
              ) : (
                <span>No filter selected</span>
              )}
            </div>
            <div className="flex gap-4">
              <a
                className={`underline cursor-pointer ${
                  sort === 'asc' ? 'text-custom-orange' : 'text-header'
                }`}
                onClick={() => handleOrderJobs('asc')}
              >
                Asc
              </a>
              <a
                className={`underline cursor-pointer ${
                  sort === 'desc' ? 'text-custom-orange' : 'text-header'
                }`}
                onClick={() => handleOrderJobs('desc')}
              >
                Desc
              </a>
              <span className="border-r-2 border-header"></span>
              <a
                className="underline cursor-pointer"
                onClick={handleClearFilters}
              >
                Clear
              </a>
            </div>
          </div>

          <div className="w-full grid grid-cols-1 gap-5 mt-6">
            {jobs.map((job) => (
              <Job job={job} key={job.id} />
            ))}
          </div>
        </main>
      </div>
    </FilterContext.Provider>
  );
}
